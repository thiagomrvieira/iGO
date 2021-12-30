<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnerPersonalDataResource extends JsonResource
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
            'company_name'        => $this->company_name,
            'responsible_name'    => $this->name,
            'email'               => $this->email,
            'phone_number'        => $this->phone_number,
            'mobile_phone_number' => $this->mobile_phone_number,
            'images'              => new PartnerImageResource($this->images),
        ]; 
    }
}
