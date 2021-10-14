<?php

namespace App\Http\Traits;

use App\Models\Order;
use App\Models\OrderStatusType;
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
                'address_id'           => Auth::user()->addresses->where('address_type_id', 1)->first()->id,
                'tax_name'             => Auth::user()->name,
                'tax_number'           => Auth::user()->client->tax_number ?? null,
            ]
        );
    }

    # Checkout order
    public function checkoutOrder($request)
    {   
        return Order::updateOrCreate(
            [
                'client_id'            => Auth::user()->client->id,
                'order_status_type_id' => OrderStatusType::where('name', 'Aberto')->first()->id,
            ],
            [
                'address_id'           => $request->address_id  ?? Auth::user()->addresses->where('address_type_id', 1)->first()->id,
                'campaign_id'          => $this->checkCampaignCode($request->campaign_code) ?? null,
                'tax_name'             => $request->tax_name   ?? Auth::user()->name,
                'tax_number'           => $request->tax_number ?? Auth::user()->client->tax_number,
                // 'amount'               => $request->amount,
                'deliver_at'           => $request->deliver_at ?? null,
            ]
        );
    }

    # Check Campaign Code
    public function checkCampaignCode($campaign_code)
    {
        return null;
    }
    
}