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
        $partner = $this->cart->first()->product->partner ?? null;
        $partnerAddress = $partner->address ?? null;

        return [
            'id'           => $this->id,
            'order_number' => '#' . str_pad($this->id, 8, 0, STR_PAD_LEFT),
            'partner'      => [
                'id'       => $partner->id   ?? null,
                'name'     => $partner->name ?? null,
                'images'   => new PartnerImageResource($partner->images),
                'category' => new PartnerCategoryResource($partner->mainCategory),
                'address'  => [
                    'line_1'    => $partnerAddress->line_1       ?? null,
                    'line_2'    => $partnerAddress->line_2       ?? null,
                    'county'    => $partnerAddress->county->name ?? null,
                    'locality'  => $partnerAddress->locality     ?? null,
                    'post_code' => $partnerAddress->post_code    ?? null,
                    'country'   => $partnerAddress->country      ?? null,
                ]
            ],
            'products'         => CartProductResource::collection($this->cart) ?? null,
            'delivery_address' => new AddressResource($this->address),
            'delivery_time'    => $this->deliver_at ?? '30 a 60 min' ,
            'tax_data'         => [
                'tax_name'   => $this->tax_name,  
                'tax_number' => $this->tax_number,
            ],
            'subtotal'          => $this->subtotal(),
            'shipping_fee'      => $this->shippingFee(),
            'total'             => $this->total(),
            'promotional_code'  => $this->campaign->code ?? null,
            'discount'          => $this->discount(),
            'total_final'       => $this->total() - $this->discount() ?? null,
            'can_reorder'       => $this->canReorder(),

        ];
        
    }
}
