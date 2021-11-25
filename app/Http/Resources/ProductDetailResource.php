<?php

namespace App\Http\Resources;

use App\Models\ProductOption;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
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
            'options' => [
                [
                    'id'        => ProductOption::where('name', 'side')->first()->id,
                    'text'      => 'Side dishes',
                    'type'      => 'radio',
                    'mandatory' => true,
                    'values'    => ProductSideResource::collection($this->sides)
                ],
                [
                    'id'        => ProductOption::where('name', 'sauce')->first()->id,
                    'text'      => 'Sauces',
                    'type'      => 'radio',
                    'mandatory' => false,
                    'values'    => ProductSauceResource::collection($this->sauces)
                ],
                [
                    'id'        => ProductOption::where('name', 'extra')->first()->id,
                    'text'      => 'Extras',
                    'type'      => 'checkbox',
                    'mandatory' => false,
                    'values'    => ProductExtraResource::collection($this->extras)
                ],
            ],
            'product_allergens' => ProductAllergenResource::collection($this->allergens),
            'image'             => config('app.url') . preg_replace('/\\.[^.\\s]{3,4}$/', '', $this->image)  ?? null,  
            'price'             => $this->price,
            'final_price'       => $this->finalPrice() ?? null,
            'note'              => $this->note,
            'campaign' => [
                'id'   => $this->campaignData()->id   ?? null,
                'name' => $this->campaignData()->name ?? null,
            ],
            'created_at' => $this->created_at,
            'available'  => $this->available,
        ];    
    }
}
