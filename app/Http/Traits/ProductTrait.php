<?php

namespace App\Http\Traits;

use App\Models\Allergen;
use App\Models\Product;
use App\Models\Extra;
use App\Models\Sauce;
use App\Models\Side;

use Illuminate\Http\Request;

trait ProductTrait {  
        
    /**
     * Create a new Product
     */
    public function createProduct($request) 
    {

        // dd($request->all());

        $product = Product::create([
            'partner_id'  => $request->partner_id,
            'image'       => $this->UploadProductImage($request),
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'available'   => $request->available,
            'category_id' => $request->category_id,
            'note'        => $request->note,
        ]);

        # Check if the $request has extra inputs before call function create
        if ($request->extras) {
            $this->createExtraProduct($request, $product);
        }

        # Create the relation between Product and Side 
        $this->storeSideProduct($request, $product);
        
        # Create the relation between Product and Sauce 
        $this->storeSauceProduct($request, $product);
        
        # Create the relation between Product and Allergen 
        $this->storeAllergenProduct($request, $product);
    }
    
    /**
     * Create extra items and the relation with the product 
     */
    private function createExtraProduct($request, $product) 
    {
        foreach (json_decode($request->extras) as $extras) {
            $extra = Extra::updateOrCreate([
                'product_id' => $product->id,
                'name'       => $extras->name,
            ],[
                'product_id' => $product->id,
                'name'       => $extras->name,
                'price'      => $extras->price,
            ]);
        }
    }

    /**
     * Persist side product in pivot table.
     */
    private function storeSideProduct($request, $product)
    {

        # Get all sides and pluck the slug column 
        $sides = Side::where('active', 1)->get();
        $sideSlugs = $sides->pluck('slug');

        # Check if the categories slug exists in $request and set array $sideIdsForUpdate
        $sideIdsForUpdate = $product->sides->pluck('side_id')->toArray();
        
        # Check if the $request has a slug from side and push into sideIdsForUpdate
        foreach ($sideSlugs as $slug) {
            if( $request->$slug){
                $sideId = $sides->where('slug', $slug)->first();
                array_push($sideIdsForUpdate, $sideId->id);
            }
        }

        # Update sides in pivot table
        if ($sideIdsForUpdate != []) {
            $product->sides()->sync(array_filter($sideIdsForUpdate));
        }

        return true;
    }
    
    /**
     * Update an existing Product.
     */
    public function updateProduct($request, $product) 
    {

        # Update product values
        $product->update($request->all());

        # Check if input image has value and update
        if ($request->image) {
            $product->update(['image' => $this->UploadProductImage($request)]);
        }

        # Check if input extras has value and Update extra model
        if ($request->extras) {
            $this->createExtraProduct($request, $product);
        }

        # Create the relation between Product and Side 
        $this->storeSideProduct($request, $product);

        # Create the relation between Product and Sauce 
        $this->storeSauceProduct($request, $product);

        # Create the relation between Product and Allergen 
        $this->storeAllergenProduct($request, $product);
    }

    /**
     * Persist Sauce product in pivot table.
     */
    private function storeSauceProduct($request, $product)
    {

        # Get all Sauces and pluck the slug column 
        $sauces = Sauce::where('active', 1)->get();
        $sauceSlugs = $sauces->pluck('slug');

        # Check if the categories slug exists in $request and set array $sauceIdsForUpdate
        $sauceIdsForUpdate = $product->sauces->pluck('sauce_id')->toArray();
        
        # Check if the $request has a slug from Sauce and push into sauceIdsForUpdate
        foreach ($sauceSlugs as $slug) {
            if( $request->$slug){
                $sauceId = $sauces->where('slug', $slug)->first();
                array_push($sauceIdsForUpdate, $sauceId->id);
            }
        }

        # Update Sauces in pivot table
        if ($sauceIdsForUpdate != []) {
            $product->sauces()->sync(array_filter($sauceIdsForUpdate));
        }

        return true;
    }

     /**
     * Persist Allergen product in pivot table.
     */
    private function storeAllergenProduct($request, $product)
    {

        # Get all Allergen and pluck the slug column 
        $allergens     = Allergen::where('active', 1)->get();
        $allergenSlugs = $allergens->pluck('slug');

        # Check if the categories slug exists in $request and set array $allergenIdsForUpdate
        $allergenIdsForUpdate = $product->allergens->pluck('allergen_id')->toArray();
        
        # Check if the $request has a slug from Allergen and push into allergenIdsForUpdate
        foreach ($allergenSlugs as $slug) {
            if($request->$slug){
                $allergenId = $allergens->where('slug', $slug)->first();
                array_push($allergenIdsForUpdate, $allergenId->id);
            }
        }

        # Update Allergen in pivot table
        if ($allergenIdsForUpdate != []) {
            $product->allergens()->sync(array_filter($allergenIdsForUpdate));
        }

        return true;
    }

}