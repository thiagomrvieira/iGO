<?php

namespace App\Http\Traits;

use App\Models\Cart;
use App\Models\CartExtra;
use App\Models\CartSauce;
use App\Models\CartSide;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CartTrait {
    
    # Add Product to a cart or update if exist
    public function AddProductToCart($request)
    {
        return Cart::updateOrCreate(
            [
                'client_id'  => Auth::user()->client->id,
                'product_id' => $request->product_id,
            ],
            [
                'client_id'  => Auth::user()->client->id,
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity,
            ]
        );
    }


    # Add Extra to a cart or update if exist
    public function AddExtraToCart($request, $cartProduct)
    {
        if (isset($request->extras)) {
            $str = str_replace('\'', '"', $request->extras);

            foreach (json_decode($str) as $extras) {
                CartExtra::updateOrCreate(
                    [
                        'cart_id'  => $cartProduct->id,
                        'extra_id' => $extras->extra_id,
                    ],
                    [
                        'cart_id'  => $cartProduct->id,
                        'extra_id' => $extras->extra_id,
                        'quantity' => $extras->extra_quantity,
                    ]
                );
            }
        }
    }


    # Add Side to a cart or update if exist
    public function AddSideToCart($request, $cartProduct)
    {
        if (isset($request->side)) {
            CartSide::updateOrCreate(
                [
                    'cart_id' => $cartProduct->id,
                ],
                [
                    'cart_id'  => $cartProduct->id,
                    'side_id'  => $request->side,
                ]
            );
        }
    }

    # Add Sauce to a cart or update if exist
    public function AddSauceToCart($request, $cartProduct)
    {
        if (isset($request->sauce)) {
            CartSauce::updateOrCreate(
                [
                    'cart_id' => $cartProduct->id,
                ],
                [
                    'cart_id'  => $cartProduct->id,
                    'sauce_id' => $request->sauce,
                ]
            );
        }
    }
    
}