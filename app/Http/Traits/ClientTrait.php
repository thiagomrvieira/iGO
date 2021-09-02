<?php

namespace App\Http\Traits;
use App\Models\Client;
use Illuminate\Http\Request;


trait ClientTrait {
    
    #   Create a new Client - API
    public function createClient($request) 
    { 
        return Client::create($request->all());

        // $client = Client::create([
        //     'user_id'             => $request['user_id'], 
        //     'name'                => $request['name'], 
        //     'email'               => $request['email'], 
        //     'mobile_phone_number' => $request['mobile_phone_number'], 
        //     'active'              => $request['active'], 
        // ]);
                   
        // return $client;
    }

    
    
}