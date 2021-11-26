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
            'category'    => [
                'id'   => $this->category->id,
                'name' => $this->category->name,
            ],
            'image'             => config('app.url') . 'storage'  . DIRECTORY_SEPARATOR . 'images'           . DIRECTORY_SEPARATOR . 
                                                       'partner'  . DIRECTORY_SEPARATOR . $this->partner->id . DIRECTORY_SEPARATOR . 
                                                       'products' . DIRECTORY_SEPARATOR . preg_replace('/\\.[^.\\s]{3,4}$/', '', $this->image) ?? null,
            'price'             => $this->price,
            'final_price'       => $this->finalPrice() ?? null,
            'note'              => $this->note,
            'campaign' => [
                'id'   => $this->campaignData()->id   ?? null,
                'name' => $this->campaignData()->name ?? null,
            ],
            'created_at' => $this->created_at,
            'available'  => $this->available,
        ];    
      
    }
}
