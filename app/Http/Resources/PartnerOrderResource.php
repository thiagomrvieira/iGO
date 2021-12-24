<?php

namespace App\Http\Resources;

use App\Models\Image;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PartnerOrderResource extends JsonResource
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
            'status'      => $this->orderDeliveryStatusType->name        ?? 'Novo',
            'description' => $this->orderDeliveryStatusType->description ?? 'Novos pedidos',
            'date'        => $this->created_at,
        ];
    }
}
