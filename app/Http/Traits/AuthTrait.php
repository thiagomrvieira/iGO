<?php

namespace App\Http\Traits;

use App\Http\Resources\ClientResource;
use App\Http\Resources\DeliverymanResource;
use App\Http\Resources\PartnerResource;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AuthTrait {
    
    public function getLoggedUser()
    {
        #   Check if the request is for deliveryman login
        if (Auth::user()->is_deliveryman == 1) {
            $message = 'Estafeta logado!';
            $user    = new DeliverymanResource( Auth::user()->deliveryman );
            
            #   Check if the account was approved by the admin
            if (Auth::user()->deliveryman->active == false) {
                abort( response()->json(['error' => $error ?? 'Your account has not been authorized yet'], 401) );
            }
        }

        #   Check if the request is for client login
        if (Auth::user()->is_client == 1) {
            $message = 'Cliente logado!';
            $user    = new ClientResource( Auth::user()->client );
            
            #   Check if the account was approved by the admin
            if (Auth::user()->client->active == false) {
                abort( response()->json(['error' => $error ?? 'Your account has not been authorized yet'], 401) );
            }
        }

        #   Check if the request is for partner login
        if (Auth::user()->is_partner == 1) {
            $message = 'Aderente logado!';
            $user    = new PartnerResource( Auth::user()->partner );
            
            #   Check if the account was approved by the admin
            if (Auth::user()->partner->active == false) {
                abort( response()->json(['error' => $error ?? 'Your account has not been authorized yet'], 401) );
            }
        }
        
        return [
            'user'    => $user,
            'message' => $message
        ];
        
    }

    
}