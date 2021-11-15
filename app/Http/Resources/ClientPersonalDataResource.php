<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientPersonalDataResource extends JsonResource
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
            'id'                  => $this->id,
            'name'                => $this->name,
            'birth_date'          => $this->birth_date,
            'email'               => $this->email,
            'mobile_phone_number' => $this->mobile_phone_number,
            'profile_image'       => $this->profile_image == null ? 
                                        config('app.url') . 'storage/assets-mobile/default_32' :
                                        config('app.url') .  preg_replace('/\\.[^.\\s]{3,4}$/', '', $this->profile_image),

        ];    

    }
}