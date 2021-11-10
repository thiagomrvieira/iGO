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
            'client_image' => $this->client->image,
            'review'       => $this->review         ?? null,
            'rating'       => $this->rate           ?? null,
            'date'         => $this->created_at,
        ];
    }
}
