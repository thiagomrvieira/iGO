<?php

namespace App\Http\Traits;
use App\Models\Address;
use Illuminate\Http\Request;


trait AddressTrait {
    
    #   Get the request and define the method to be used
    public function getAddressRequest($request, $resourceId) { 
        $checkAddress = Address::where('user_id', $resourceId)->first();
        
        // dd(is_array($request));
        
        if (is_null($checkAddress)) {
            # Check if the data is an array - Sent from home
            if (is_array($request)) {
                $address = $this->createAdressFromHome($request, $resourceId);
            } else {
                $address = $this->createAdress($request, $resourceId);
            }
            
        } else {
            $address = $this->updateAdress($request, $checkAddress);
        }
        return $address;
    }
    
    #   Create addresses from DeliveryManController and PartnerController
    public function createAdress(Request $request, $user_id) {
        $resource = $request->all();
        $resource['user_id'] = $user_id;

        $address = Address::create($resource);
        return $address;
    }

    #   Update addresses from DeliveryManController and PartnerController
    public function updateAdress(Request $request, Address $address) {
        $address->update($request->all());
        return $address;
    }

    #   Create addresses from home
    public function createAdressFromHome($request, $user_id) {
        $resource = $request;
        $resource['user_id'] = $user_id;
       
        $address = Address::create($resource);

        return $address;

    }
}