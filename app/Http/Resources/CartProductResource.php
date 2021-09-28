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
            'product_id'          => $this->product_id,
            'product_name'        => $this->product->name,
            'product_price'       => $this->product->price,
            'quantity'            => $this->quantity,
            'amount'              => $this->quantity * $this->product->price,
            'created_at'          => $this->created_at,
        ];    
    }
}
