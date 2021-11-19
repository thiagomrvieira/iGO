<?php

namespace App\Http\Resources;

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
        return [
            'product' => [
                'id'       => $this->product_id,
                'name'     => $this->product->name,
                'price'    => $this->product->price,
                'quantity' => $this->quantity,
            ],
           
            'extras' => CartProductExtraResource::collection($this->cartExtras),
            'side'   => [
                'id'   => $this->cartSide->side->id   ?? null,
                'name' => $this->cartSide->side->name ?? null,
            ],
            'sauce'   => [
                'id'   => $this->cartSauce->sauce->id   ?? null,
                'name' => $this->cartSauce->sauce->name ?? null,
            ],
            'note'       => $this->note,
            'amount'     => $this->amount(),
            'created_at' => $this->created_at,
        ];   
    }
}
