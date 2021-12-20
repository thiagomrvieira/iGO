<?php

namespace App\Http\Resources;

use App\Models\ProductOption;
use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $product  = $this->product ?? null;
        $checkout = [
            'product' => [
                'cart_product_id' => $this->id             ?? null,
                'product_id'      => $this->product_id     ?? null,
                'name'            => $product->name        ?? null,
                'price'           => $product->price       ?? null,
                'quantity'        => $this->quantity       ?? null,
                'description'     => $product->description ?? null,
            ],
            'options' => [],
            'note'       => $this->note ?? null,
            'amount'     => $this->amount(),
            'created_at' => $this->created_at,
        ];
        
        
        #   Check if exists Extras in the cart to append in options array  
        if (count($this->cartExtras) > 0 )
        {
            $checkout ['options'][] =   
                [
                    "id"    => ProductOption::where('name', 'extra')->first()->id,
                    "name"  => "extras",
                    "values"=> CartProductExtraResource::collection($this->cartExtras),
                ];
        }

        #   Check if exists Side in the cart to append in options array  
        if ($this->cartSide ?? null)
        {
            $checkout ['options'][] =   
                [
                    "id"    => ProductOption::where('name', 'side')->first()->id,
                    "name"  => "side",
                    "values"=> [
                        'id'    => $this->cartSide->side->id   ?? null,
                        'name'  => $this->cartSide->side->name ?? null,
                        'price' => null,
                    ],
                ];
        }

        #   Check if exists Sauce in the cart to append in options array  
        if ($this->cartSauce ?? null)
        {
            $checkout ['options'][] =   
                [
                    "id"    => ProductOption::where('name', 'sauce')->first()->id,
                    "name"  => "sauce",
                    "values"=> [
                        'id'    => $this->cartSauce->sauce->id   ?? null,
                        'name'  => $this->cartSauce->sauce->name ?? null,
                        'price' => null,
                    ],
                ];
        }

        return $checkout;   
    }
}
