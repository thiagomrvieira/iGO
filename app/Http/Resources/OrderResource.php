<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id'      => $this->id,
            'status'  => $this->orderStatusType->name,
            'date'    => $this->created_at,
            'partner' => [
                'id'    => $this->cart->first()->product->partner->id,  
                'name'  => $this->cart->first()->product->partner->name,  
                'image' => $this->cart->first()->product->partner->images->image_cover ?? null,  
            ],
            
            
        ];
    }
}
