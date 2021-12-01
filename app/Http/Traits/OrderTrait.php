<?php

namespace App\Http\Traits;

use App\Models\Campaign;
use App\Models\Extra;
use App\Models\Order;
use App\Models\OrderStatusType;
use App\Models\Product;
use App\Models\Sauce;
use App\Models\Side;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait OrderTrait {
    
    # Get an Order with status 'opened' or create one
    public function firstOrCreateOrder($request)
    {
        return Order::firstOrCreate(
            [
                'client_id'            => Auth::user()->client->id,
                'order_status_type_id' => OrderStatusType::where('name', 'Aberto')->first()->id,
            ],
            [
                'client_id'            => Auth::user()->client->id,
                'order_status_type_id' => OrderStatusType::where('name', 'Aberto')->first()->id,
                'address_id'           => Auth::user()->addresses->where('address_type_id', 1)->first()->id ?? Auth::user()->addresses->first()->id,
                'tax_name'             => Auth::user()->name,
                'tax_number'           => Auth::user()->client->tax_number ?? null,
                'partner_id'           => Product::where('id', $request->product_id)->first()->partner_id,
            ]
        );
    }

    # Checkout order
    public function checkoutOrderData($request, $cartItems)
    {   
        
        return Order::updateOrCreate(
            [
                'client_id'            => Auth::user()->client->id,
                'order_status_type_id' => OrderStatusType::where('name', 'Aberto')->first()->id,
            ],
            [
                'address_id'           => $request->address_id  ?? (Auth::user()->addresses->where('address_type_id', 1)->first()->id ?? Auth::user()->addresses->first()->id),
                'tax_name'             => $request->tax_name    ?? Auth::user()->name,
                'tax_number'           => $request->tax_number  ?? Auth::user()->client->tax_number,
                'deliver_at'           => $request->deliver_at  ?? null,
                'campaign_id'          => $this->checkCampaignCode($request->campaign_code),
                'partner_id'           => $cartItems->first()->product->partner_id,

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

        return false; 
    }

    # Checkout order
    public function finishOrder()
    {   
        #  Save Product values (Name and Price) in case of change
        $this->saveActualValues(); 

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

    #  Save Product values (Name and Price) in case of change
    public function saveActualValues()
    {   
        $order = Order::where('client_id', Auth::user()->client->id)
                      ->where('order_status_type_id',  OrderStatusType::where('name', 'Aberto')->first()->id)->first();
        
        foreach ($order->cart as $cartItem) {
            if ( $product = Product::where('id', $cartItem->product_id)->first() )
            {
                $cartItem->product_name  = $product->name;
                $cartItem->product_price = $product->price;
                $cartItem->save();
            }
            #   Save extras
            foreach ($cartItem->cartExtras as $cartExtra) {
                if ( $extra = Extra::where('id', $cartExtra->extra_id)->first() )
                {
                    $cartExtra->extra_name  = $extra->name;
                    $cartExtra->extra_price = $extra->price;
                    $cartExtra->save();
                }
            }
            #   Save Side
            if ( $side = Side::where('id', $cartItem->cartSide?->side_id)->first() )
            {
                $cartItem->cartSide->side_name = $side->name;
                $cartItem->cartSide->save();
            }
            #   Save Sauce
            if ( $sauce = Sauce::where('id', $cartItem->cartSauce?->sauce_id)->first() )
            {
                $cartItem->cartSauce->sauce_name = $sauce->name;
                $cartItem->cartSauce->save();
            }
        }
    }

    /**
     * DELIVERYMAN FUNCTIONS 
     */
    
    #   GET ORDERS IN PROGRESS (order status type id between 4, 5, 6, 7 and related to the logged deliveryman)
    public function inProgressOrders()
    {
        return Order::whereIn('order_status_type_id', array(4, 5, 6, 7) )->whereHas('deliverymen', function (Builder $query) {
            $query->where('deliveryman_id',  Auth::user()->deliveryman->id)
                  ->whereIn('order_delivery_status_type_id', array(1, 2) );
        })->get() ?? [];
    }

    
    #   GET ORDERS COMPLETED (order status type id 8 and related to the logged deliveryman)
    public function completedOrders()
    {
        return Order::where('order_status_type_id', 8)->whereHas('deliverymen', function (Builder $query) {
            $query->where('deliveryman_id',  Auth::user()->deliveryman->id)
                  ->where('order_delivery_status_type_id',  3);
            
        })->get() ?? [];
    }

    /**
     * GET ORDERS REFUSED (order related to the logged deliveryman and with order_delivery_status_type_id 4)
     */
    public function refusedOrders()
    {
        return Order::whereHas('deliverymen', function (Builder $query) {
            $query->where('deliveryman_id',  Auth::user()->deliveryman->id)
                  ->where('order_delivery_status_type_id',  4);
        })->get() ?? [];
    }
    
    public function replicateOrder(Order $oldOrder)
    {
        #   Check if exist an opened Order before replicate
        if ($order = Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->first() ) 
        {
            #   Uses the opened Order
            $newOrder = $order;
        } 
        else 
        {
            #   Replicates the old Order if there is no Order Opened
            $newOrder = $oldOrder->replicate(['order_status_type_id']);
            $newOrder->push();
        }

       
        #   Get Carts (Products, Side, Sauce, Extras and other options) from old Order
        foreach($oldOrder->cart as $oldCartItem)
        {
            #   Create new Cart Items = 'Add products to the cart'
            $newCartItem = $newOrder->cart()->create($oldCartItem->toArray());
            
            #   SET THE RELATIONS
            #   Add Side to the Cart if exist in the old one 
            if ($oldCartItem->cartSide) {
                $newCartItem->cartSide()->create($oldCartItem->cartSide->toArray());
            }
            #   Add Sauce to the Cart if exist in the old one 
            if ($oldCartItem->cartSauce) {
                $newCartItem->cartSauce()->create($oldCartItem->cartSauce->toArray());
            }
            #   Add Extras to the Cart if exist in the old one
            if ($oldCartItem->cartExtras) {
                foreach ($oldCartItem->cartExtras as $newCartExtra) {
                    $newCartItem->cartExtras()->create($newCartExtra->toArray());
                }
            }
            
        }
        return true;
    }
}