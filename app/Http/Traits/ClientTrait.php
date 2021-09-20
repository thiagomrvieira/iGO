<?php

namespace App\Http\Traits;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait ClientTrait {
    
    #   Create a new Client - API
    public function createClient($request) 
    { 
        return Client::create($request->all());
    }

    #   Update Client data - API
    public function updateClient($request) 
    { 
        $client = Client::updateOrCreate([
            'user_id' => Auth::user()->id,
        ], [
            'name'                => $request['name'], 
            'email'               => $request['email'],
            'mobile_phone_number' => $request['mobile_phone_number'],
            'birth_date'          => date('Y-m-d H:i:s' , strtotime($request['birth_date'])),
        ]);

        return $client;
    }
    
}