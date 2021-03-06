<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\DeliverymanResource;
use App\Http\Resources\PartnerLoginResource;
use App\Http\Resources\PartnerResource;
use App\Http\Traits\AddressTrait;
use App\Http\Traits\AuthTrait;
use App\Http\Traits\ClientTrait;
use App\Http\Traits\UserTrait;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Bridge\RefreshToken;
use Laravel\Passport\Token;

class PassportAuthController extends Controller
{
    use AddressTrait, UserTrait, ClientTrait, AuthTrait;

    /** 
     * CREATE NEW USER 
     **
     *  @OA\Post(
     *      path="/api/v1/register",
     *      tags={"General: Auth"},
     *      summary="Register a new user",
     *      description="Create a new user and return token",
     *      operationId="register",
     *          @OA\RequestBody(
     *              required=true,
     *              @OA\JsonContent(
     *                  type="object",
     *                  @OA\Property(property="name", type="string", example="Mussum Ipsum"),
     *                  @OA\Property(property="email", type="string", example="mussum@igo.pt"),
     *                  @OA\Property(property="mobile_phone_number", type="integer", example="978 645 312"),
     *                  @OA\Property(property="password", type="string", example="iGO@123"),
     *                  @OA\Property(property="line_1", type="string", example="Address line 1. Eg: Av. Mauris nec dolor, nº 50"),
     *                  @OA\Property(property="county_id", type="integer", example="1"),
     *                  @OA\Property(property="locality", type="string", example="Aptent"),
     *              )
     *          ),
     *      
     *      @OA\Response(
     *          response=201,
     *          description="Resource created",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              example= {
     *                  "status": "success",
     *                  "message": "Lista de aderentes",
     *                  "data": {
     *                      "user": {
     *                          "name": "string",
     *                          "email": "string",
     *                          "active": "boolean",
     *                          "is_admin": "boolean",
     *                          "is_partner": "boolean",
     *                          "is_deliveryman": "boolean",
     *                          "is_client": "boolean",
     *                          "created_at": "datetime",
     *                          "available": "boolean",
     *                          "id": "integer"
     *                      }, 
     *                  }
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              example= {
     *                  "message": "The given data was invalid.",
     *                  "errors": {
     *                      "name" : {
     *                          {
     *                              "string",
     *                          },
     *                      },
     *                      "email" : {
     *                          {
     *                              "string",
     *                          },
     *                      },
     *                      "mobile_phone_number" : {
     *                          {
     *                              "string",
     *                          },
     *                      },
     *                      "line_1" : {
     *                          {
     *                              "string",
     *                          },
     *                      },
     *                      
     *                  },
     *              },
     *          )
     *      ),
     *  )
     *
     *  @return \Illuminate\Http\Response
     */
    public function register(ClientStoreRequest $request)
    {
        # Create User
        $user = $this->createUserFromApi($request);
        
        # Get the user id and set value in array 
        $request['user_id'] = $user->id ?? null;
        
        # Create Client
        $client = $this->createClient($request);

        # Create Address
        $address = $this->createAdressFromApi($request, $client->user->id); 
        
        # Create Api token
        // $token = $user->createToken('igoApiToken')->accessToken;
 
        return response()->json([
            'status'  => 'success',
            'message' => 'Utilizador criado!',
            'data' => [  
                'user'  => $user,
                // 'token' => $token,
            ],
        ], 201);
    
    }
 
    /** 
     * LOG USER 
     **
     *  @OA\Post(
     *      path="/api/v1/login",
     *      tags={"General: Auth"},
     *      summary="Login",
     *      description="Log user and return an api token - For protected routes set the authorization: Bearer {api_token}",
     *      operationId="login",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="email", type="string", example="client01@igo.pt"),
     *              @OA\Property(property="password", type="string", example="iGOdelivery"),
     *          )
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              example= {
     *                  "status": "success",
     *                  "message": "Utilizador logado!",
     *                  "data": {
     *                      "user": {
     *                          "id": "integer",
     *                          "name": "string",
     *                          "email": "string",
     *                          "active": "boolean",
     *                          "is_admin": "boolean",
     *                          "is_partner": "boolean",
     *                          "is_deliveryman": "boolean",
     *                          "is_client": "boolean",
     *                          "created_at": "datetime",
     *                          "last_address_id": "integer",
     *                      },
     *                      "token": "string", 
     *                  }
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              example= {
     *                  "error": "string",
     *              },
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *  )
     * 
     *  @return \Illuminate\Http\Response
    **/
    public function login(Request $request)
    {
        $data = [
            'email'    => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {

            # Get data from logged user and set the message
            $userAndMessage = $this->getLoggedUser();

            #   Create token 
            $token = auth()->user()->createToken('igoApiToken')->accessToken;

            return response()->json([
                'status'  => 'success',
                'message' => $userAndMessage['message'] ?? 'Utilizador logado!',
                'data' => [  
                    'user'  => $userAndMessage['user'] ?? auth()->user(),
                    'token' => $token,
                ],
            ], 200);

        } 
        
        return response()->json(['error' => $error ?? 'Unauthorised'], 401);
        
    } 
    

    /** 
     * LOGOUT USER 
     **
     *  @OA\Post(
     *      path="/api/v1/logout",
     *      tags={"General: Auth"},
     *      summary="Logout",
     *      description="Remove api token for logged user",
     *      operationId="logout",
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              example= {
     *                  "status": "success",
     *                  "message": "Logout efetuado!"
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              example= {
     *                  "error": "string",
     *              },
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      security={
     *          {"api_key": {}}
     *      }
     *  )
     * 
     *  @return \Illuminate\Http\Response
    **/
    public function logout()
    {
        Token::where('user_id', Auth::user()->id)->update(['revoked' => true]);

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Logout efetuado!'], 200);
    } 


}
