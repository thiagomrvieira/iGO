<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'id'           => $this->id,
            'client_name'  => $this->client->name,
            'client_image' => $this->client->image  ?? config('app.url') . 'storage/assets-mobile/profile_img',
            'review'       => $this?->review,
            'rating'       => $this?->rate,          
            'date'         => $this->created_at,
        ];
    }
}
