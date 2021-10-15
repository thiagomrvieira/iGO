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
        return [
            'products'         => CartProductResource::collection($this->cart) ?? null,
            'delivery_address' => new AddressResource($this->address),
            'delivery_time'    => $this->deliver_at ?? '30 a 60 min' ,
            'tax_data' => [
                'tax_name'   => $this->tax_name,  
                'tax_number' => $this->tax_number,
            ],
            // 'subtotal'       => $this->subtotal(),
            // 'shipping_fee'   => $this->shippingFee(),
            // 'total'          => $this->total(),
            // 'discount'       => $this->discount(),
            // 'total_final'    => $this->total() - $this->discount() ?? null,
        ];
        
    }
}
