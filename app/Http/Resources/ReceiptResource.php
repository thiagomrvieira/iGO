<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceiptResource extends JsonResource
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
            'order_id'     => $this->order->id,
            'order_number' => '#' . str_pad($this->order->id, 8, 0, STR_PAD_LEFT),
            'partner'      => [
                'name'    => $this->partner->name,
                'address' => $this->partner->address->line_1,
            ],
            'submitted_at' => $this->order->submitted_at ,
            'sub_total'    => $this->subtotal ,
            'total'        => $this->total ,
            'shipping_fee' => $this->shipping_fee ,
        ];    
    }
}
