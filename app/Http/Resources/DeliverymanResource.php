<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliverymanResource extends JsonResource
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
            'deliveryman_id'          => $this->id,
            'user_id'                 => $this->user_id ?? null, 
            'name'                    => $this->name,
            'email'                   => $this->email,
            'mobile_phone_number'     => $this->mobile_phone_number,
            'address'                 => $this->address,
            'birth_date'              => $this->birth_date,
            'nacionality'             => $this->nacionality,
            'identity_card_number'    => $this->identity_card_number,
            'tax_number'              => $this->tax_number,
            'social_insurance_number' => $this->social_insurance_number,
            'driving_license_number'  => $this->driving_license_number,
            'bank_account_name'       => $this->bank_account_name,
            'bank_account_number'     => $this->bank_account_number,
            'approved_at'             => $this->approved_at,
            'active'                  => $this->active,
            'created_at'              => $this->created_at,
        ];
    }
}
