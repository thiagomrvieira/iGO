<?php

namespace App\Http\Traits;

use App\Models\Campaign;
use App\Models\Order;
use App\Models\OrderStatusType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait OrderTrait {
    
    # Get an Order with status 'opened' or create one
    public function firstOrCreateOrder()
    {
        return Order::firstOrCreate(
            [
                'client_id'            => Auth::user()->client->id,
                'order_status_type_id' => OrderStatusType::where('name', 'Aberto')->first()->id,
            ],
            [
                'client_id'            => Auth::user()->client->id,
                'order_status_type_id' => OrderStatusType::where('name', 'Aberto')->first()->id,
                'address_id'           => Auth::user()->addresses->where('address_type_id', 1)->first()->id,
                'tax_name'             => Auth::user()->name,
                'tax_number'           => Auth::user()->client->tax_number ?? null,
            ]
        );
    }

    # Checkout order
    public function checkoutOrderData($request)
    {   
        
        return Order::updateOrCreate(
            [
                'client_id'            => Auth::user()->client->id,
                'order_status_type_id' => OrderStatusType::where('name', 'Aberto')->first()->id,
            ],
            [
                'address_id'           => $request->address_id  ?? Auth::user()->addresses->where('address_type_id', 1)->first()->id,
                'tax_name'             => $request->tax_name    ?? Auth::user()->name,
                'tax_number'           => $request->tax_number  ?? Auth::user()->client->tax_number,
                'deliver_at'           => $request->deliver_at  ?? null,
                'campaign_id'          => $this->checkCampaignCode($request->campaign_code),
            ]
        );
    }


    # Check Campaign Code and return its id
    public function checkCampaignCode($campaign_code)
    {
        #   Get campaign 
        if($campaign = Campaign::where('active', 1)->where('code', $campaign_code)->first()){
            #   Check if the campaign date is valid
            if (Carbon::now() >= $campaign->start_date && Carbon::now() <= $campaign->finish_date) {
                #   Return the campign id
                return $campaign->id;       
            }
        }

        return null; 
    }

    # Checkout order
    public function finishOrder()
    {   
        return Order::updateOrCreate(
            [
                'client_id'            => Auth::user()->client->id,
                'order_status_type_id' => OrderStatusType::where('name', 'Aberto')->first()->id,
            ],
            [
                'order_status_type_id' => 2,
            ]
        );
    }
    
}