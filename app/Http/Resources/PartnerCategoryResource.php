<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnerCategoryResource extends JsonResource
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
            'id'              => $this->id,
            'name'            => $this->name,
            'image'           => config('app.url') . 'storage' . DIRECTORY_SEPARATOR . 'assets-mobile' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $this->image) 
                                                  ?? 'storage' . DIRECTORY_SEPARATOR . 'assets-mobile' . DIRECTORY_SEPARATOR . 'default_32',
            'parent_category' => $this->parent->name ?? null,
        ]; 
    }
}
