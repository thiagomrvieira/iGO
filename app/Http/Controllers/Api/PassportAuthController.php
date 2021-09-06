<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
     * Client registration
     */
    public function register(Request $request)
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
 
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
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
