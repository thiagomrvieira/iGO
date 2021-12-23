<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'id'              => $this->id,
            'name'            => $this->name ?? null, 
            'email'           => $this->email ?? null,
            'active'          => $this->active,
            'is_admin'        => $this->is_admin,
            'is_partner'      => $this->is_partner,
            'is_deliveryman'  => $this->is_deliveryman,
            'is_client'       => $this->is_client,
            'created_at'      => $this->created_at,
            'last_address_id' => $this->lastUsedAddress()->address_id ?? null,
        ];  
    }
}
