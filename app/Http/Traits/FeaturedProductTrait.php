<?php

namespace App\Http\Traits;
use App\Models\Featured;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait FeaturedProductTrait {  
        
    /**
     * Create a new Featured Product request
     */
    public function createFeaturedProductRequest($product) 
    {
        $featuredProduct = Featured::firstOrCreate(
            ['product_id' => $product->id],
            ['product_id' => $product->id,
             'partner_id' => Auth::user()->partner->id,
            ]
        );

       return $featuredProduct;
    }

    /**
     * Check the status of the feature product request in $request
     */
    public function updateFeaturedProductRequest($request, $product) 
    {   
        if ($request->featured == 0) {
           return $this->removeFeaturedProductRequest($product);
        } 

        return $this->createFeaturedProductRequest($product);
    }

    /**
     * Remove Featured Product request in update
     */
    public function removeFeaturedProductRequest($product) 
    {
        return Featured::where('product_id', $product->id)->delete();
    }


}