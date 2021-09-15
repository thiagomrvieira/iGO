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

class PassportAuthController extends Controller
{
    use AddressTrait, UserTrait, ClientTrait;

    /**
     * @OA\Post(
     *   path="/api/v1/register",
     *   tags={"Auth"},
     *   summary="Register a new user",
     *   description="Create a new user and return token",
     *   operationId="register",
     *
     *  @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="mobile_phone_number",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="line_1",
     *      description="address data",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="county",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="city",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Resource created",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=422,
     *       description="Validation error"
     *   ),
     *)
     **/
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
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
        $address = $this->getAddressRequest($request, $client->user->id); 
        
        # Create Api token
        $token = $user->createToken('igoApiToken')->accessToken;
 
        return response()->json(['token' => $token], 201);
    
    }
 
    /**
     * @OA\Post(
     ** path="/api/v1/login",
     *   tags={"Auth"},
     *   summary="Login",
     *   description="Log user and return an api token - For protected routes set the authorization: Bearer {api_token}",
     *   operationId="login",
     *
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
    **/

    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email'    => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
             
            $token = auth()->user()->createToken('igoApiToken')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    } 
    
    


}
