<?php

namespace App\Http\Traits;
use App\Models\Featured;

use Illuminate\Http\Request;

trait FeaturedProductTrait {  
        
    /**
     * Create a new Featured Product request
     */
    public function createFeaturedProductRequest($product) 
    {
        
        $featuredProduct = Featured::firstOrCreate(
            ['product_id' => $product->id],
            ['product_id' => $product->id]
        );

       return $featuredProduct;
    }

}