<?php

namespace App\Http\Traits;
use App\Models\Client;
use Carbon\Carbon;
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
        return Client::updateOrCreate(['user_id' => Auth::user()->id], $request->all());
    }

    
}