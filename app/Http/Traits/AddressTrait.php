<?php

namespace App\Http\Traits;
use App\Models\Address;
use App\Models\AddressTax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AddressTrait {
    
    #   Get the request and define the method to be used
    public function getAddressRequest($request, $resourceId) { 
        $checkAddress = Address::where('user_id', $resourceId)->first();
        
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

    #   Create addresses from API
    public function createAdressFromApi(Request $request, $user_id) {
        $resource = $request->all();

        $resource['user_id']      = $user_id;
        $resource['address_name'] = $request->address_name == null 
                                        ?  'Principal'
                                        :  $request->address_name;

        $address = Address::create($resource);
        return $address;
    }

    #   Create/Update addresses from API
    public function createOrUpdateAddressFromApi(Request $request) {

        foreach ($request->all() as $addressData) {
            $address = Address::updateOrCreate(
                ['user_id' => Auth::user()->id, 
                 'id'      => $addressData['address_id']                ?? null],
                ['address_name'    => $addressData['address_name']      ?? null, 
                 'user_id'         => Auth::user()->id,
                 'address_type_id' => 2,
                 'line_1'          => $addressData['line_1']            ?? null,
                 'line_2'          => $addressData['line_2']            ?? null,
                 'county_id'       => $addressData['county_id']         ?? null,
                 'locality'        => $addressData['locality']          ?? null,
                 'post_code'       => $addressData['post_code']         ?? null,
                 'country'         => $addressData['country']           ?? null,
                ]
            );

            if (isset($addressData['tax_name']) && isset($addressData['tax_number'])) {
                AddressTax::updateOrCreate(
                    ['address_id' => $address->id],
                    ['address_id' => $address->id,
                     'tax_name'   => $addressData['tax_name'], 
                     'tax_number' => $addressData['tax_number'],
                    ]
                );
            }
        }
        
    }
}