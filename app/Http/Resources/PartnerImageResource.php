<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnerImageResource extends JsonResource
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
            "image_cover" => config('app.url') . 'storage' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'partner' . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . preg_replace('/\\.[^.\\s]{3,4}$/', '', $this->image_cover) ?? null,  
            "image_01"    => config('app.url') . 'storage' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'partner' . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . preg_replace('/\\.[^.\\s]{3,4}$/', '', $this->image_01)    ?? null,
            "image_02"    => config('app.url') . 'storage' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'partner' . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . preg_replace('/\\.[^.\\s]{3,4}$/', '', $this->image_02)    ?? null,
            "image_03"    => config('app.url') . 'storage' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'partner' . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . preg_replace('/\\.[^.\\s]{3,4}$/', '', $this->image_03)    ?? null,
        ];
    }
}
