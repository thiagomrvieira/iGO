<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'          => $this->id ,
            'name'        => $this->name,
            'description' => $this->description,
            'category'    => $this->category->name ?? null,
            'image'       => $this->image,
            'price'       => $this->price,
            'note'        => $this->note,
            'campaign_id' => $this->campaign->name ?? null,
            'created_at'  => $this->created_at,
            'extras'      => $this->extras,
            'category'    => $this->category, 
        ];    
      
    }
}
