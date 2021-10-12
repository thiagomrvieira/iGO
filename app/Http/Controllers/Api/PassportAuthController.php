<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Traits\AddressTrait;
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
    use AddressTrait, UserTrait, ClientTrait;

    /** 
     * CREATE NEW USER 
     **
     *  @OA\Post(
     *      path="/api/v1/register",
     *      tags={"Auth"},
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
     *                  @OA\Property(property="county", type="string", example="Sociosqu"),
     *                  @OA\Property(property="city", type="string", example="Aptent"),
     *              )
     *          ),
     *      
     *      @OA\Response(
     *          response=201,
     *          description="Resource created",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error"
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
     *      tags={"Auth"},
     *      summary="Login",
     *      description="Log user and return an api token - For protected routes set the authorization: Bearer {api_token}",
     *      operationId="login",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="email", type="string", example="mussum@igo.pt"),
     *              @OA\Property(property="password", type="string", example="iGO@123"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
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
             
            $token = auth()->user()->createToken('igoApiToken')->accessToken;

            return response()->json([
                'status'  => 'success',
                'message' => 'Utilizador logado!',
                'data' => [  
                    'user'  => auth()->user(),
                    'token' => $token,
                ],
            ], 200);

        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    } 
    
    /** 
     * LOGOUT USER 
     **
     *  @OA\Post(
     *      path="/api/v1/logout",
     *      tags={"Auth"},
     *      summary="Logout",
     *      description="Remove api token for logged user",
     *      operationId="logout",
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
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
