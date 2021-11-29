<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id'          => $this->id,
            'status'      => $this->orderStatusType->name,
            'description' => $this->orderStatusType->description,
            'date'        => $this->created_at,
            'partner'     => [
                'id'    => $this->cart->first()->product->partner->id,  
                'name'  => $this->cart->first()->product->partner->name,  
                'image' => config('app.url') . 'storage' . DIRECTORY_SEPARATOR . 'images'  . DIRECTORY_SEPARATOR . 'partner' . DIRECTORY_SEPARATOR . 
                                               $this->id . DIRECTORY_SEPARATOR . preg_replace('/\\.[^.\\s]{3,4}$/', '', $this->cart->first()->product->partner->images->image_cover) ?? null
            ],
            'can_reorder' => $this->canReorder(),
        ];
    }
}
