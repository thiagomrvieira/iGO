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
           
            // 'extras'     => $this->cartExtras,
            'extras'   => CartProductExtraResource::collection($this->cartExtras),
            'amount'     => $this->quantity * $this->product->price,
            'created_at' => $this->created_at,
        ];   
    }
}
