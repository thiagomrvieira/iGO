<?php

namespace App\Http\Traits;
use App\Models\Address;
use Illuminate\Http\Request;


trait AddressTrait {
    
    #   Get the request and define the method to be used
    public function getAddressRequest(Request $request, $resourceId) { 
        
        $checkAddress = Address::where('id', $resourceId)->first();
        
        if (is_null($checkAddress)) {
            $address = $this->createAdress($request);
        } else {
            $address = $this->updateAdress($request, $checkAddress);
        }
        return $address;
    }
    
    #   Create addresses from DeliveryManController and PartnerController
    public function createAdress(Request $request) {
        $address = Address::create($request->all());
        return $address;
    }

    #   Update addresses from DeliveryManController and PartnerController
    public function updateAdress(Request $request, Address $address) {
        $address->update($request->all());
        return $address;
    }
}