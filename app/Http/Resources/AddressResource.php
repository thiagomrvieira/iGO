<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'id'             => $this->id,
            'address_name'   => $this->address_name ?? null, 
            'address_type'   => $this->type->name   ?? null,
            'address_line_1' => $this->line_1,
            'address_line_2' => $this->line_2,
            'county'         => [
                'id'   => $this->county->id,    
                'name' => $this->county->name,    
            ],
            'city'           => $this->city,
            'post_code'      => $this->post_code,
            'country'        => $this->country,
        ];    
    }
}
