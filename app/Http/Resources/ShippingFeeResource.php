<?php

namespace App\Http\Resources;

use App\Models\County;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingFeeResource extends JsonResource
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
            'id'                 => $this->id,
            'delivery_from_id'   => County::find($this->delivery_from)->id,
            'delivery_from_name' => County::find($this->delivery_from)->name,
            'delivery_to_id'     => County::find($this->delivery_to)->id,
            'delivery_to_name'   => County::find($this->delivery_to)->name,
            'price'              => $this->price,
        ]; 
    }
}
