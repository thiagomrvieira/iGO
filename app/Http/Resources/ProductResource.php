<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id ,
            'name'        => $this->name,
            'description' => $this->description,
            'category'    => [
                'id'   => $this->category->id,
                'name' => $this->category->name,
            ],
            'product_sides'     => ProductSideResource::collection($this->sides),
            'product_sauces'    => ProductSauceResource::collection($this->sauces),
            'product_allergens' => ProductAllergenResource::collection($this->allergens),
            'image'             => $this->image,
            'price'             => $this->price,
            'note'              => $this->note,
            'campaign' => [
                'id'   => $this->campaign->id   ?? null,
                'name' => $this->campaign->name ?? null,
            ],
            'created_at' => $this->created_at,
            'extras'     => ProductExtraResource::collection($this->extras),
        ];    
      
    }
}
