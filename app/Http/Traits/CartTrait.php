<?php

namespace App\Http\Traits;

use App\Models\Cart;
use App\Models\CartExtra;
use App\Models\CartSauce;
use App\Models\CartSide;
use App\Models\Client;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CartTrait {
    
    # Add Product to a cart
    public function AddProductToCart($request, $order)
    {
        return Cart::create(
            [
                'client_id'  => Auth::user()->client->id,
                'order_id'   => $order->id,
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity ?? 1,
                'note'       => $request->note,
            ]
        );
    }

    
    # Add Product Option to a cart or update if exist
    public function AddProductOptionToCart($request, $cartProduct)
    {
        
        if (isset($request->options)) {
            foreach ($request->options as $productOption) {

                #   Set the Product Option
                $option = ProductOption::where('id', $productOption['id'])->first();

                if (isset($productOption['values'])) {
                    
                    foreach ($productOption['values'] as $value) {
                        
                        #   Set the eloquent function to be used in creation 
                        #       (Extras can have more than one option)
                        if ($option->name == 'extra') {
                            $option->model::create(
                                [
                                    'cart_id'  => $cartProduct->id,
                                    $option->name.'_id' => $value,
                                ]
                            );
                        } else {
                            $option->model::updateOrCreate(
                                [
                                    'cart_id' => $cartProduct->id,
                                ],
                                [
                                    'cart_id'  => $cartProduct->id,
                                    $option->name.'_id' => $value,
                                ]
                            );
                        }
                        
                    }
                }

            }
        
        }

    }
    
}