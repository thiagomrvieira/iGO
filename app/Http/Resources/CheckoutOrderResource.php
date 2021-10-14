<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'products' => CartProductResource::collection($this->cart),
            // 'products' => CartProductResource::collection($this->cart),
            // 'amount'   => $this->amount(),
        ];
        // return [
        //     'product' => [
        //         'id'       => $this->product_id,
        //         'name'     => $this->product->name,
        //         'price'    => $this->product->price,
        //         'quantity' => $this->quantity,
        //     ],
           
        //     'extras' => CartProductExtraResource::collection($this->cartExtras),
        //     'side'   => [
        //         'id'   => $this->cartSide->side->id   ?? null,
        //         'name' => $this->cartSide->side->name ?? null,
        //     ],
        //     'sauce'   => [
        //         'id'   => $this->cartSauce->sauce->id   ?? null,
        //         'name' => $this->cartSauce->sauce->name ?? null,
        //     ],
        //     'amount'     => $this->amount(),
        //     'created_at' => $this->created_at,
        // ]; 
    }
}
