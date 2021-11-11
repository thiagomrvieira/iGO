<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class DeliverymanOrderResource extends JsonResource
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
            'id'          => $this->id,
            'status'      => $this->deliverymen->where('deliveryman_id',  Auth::user()->deliveryman->id)->first()
                                  ->orderDeliveryStatusType->name        ?? 'Novo',
            'description' => $this->deliverymen->where('deliveryman_id',  Auth::user()->deliveryman->id)->first()
                                  ->orderDeliveryStatusType->description ?? 'Novo pedido',
            'date'        => $this->created_at,
            'partner'     => [
                'id'    => $this->cart->first()->product->partner->id,  
                'name'  => $this->cart->first()->product->partner->name,  
                'image' => config('app.url') . $this->cart->first()->product->partner->images->image_cover ?? null,  
            ],
            
            
        ];
    }
}
