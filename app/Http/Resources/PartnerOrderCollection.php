<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class PartnerOrderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $partner = Auth::user()->partner;

        return [
            'orders' => $this->collection,
            'partner'     => [
                'id'    => $partner->id,  
                'name'  => $partner->company_name,  
                "image" => config('app.url') . 'storage' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'partner' . DIRECTORY_SEPARATOR . $partner->id . DIRECTORY_SEPARATOR . preg_replace('/\\.[^.\\s]{3,4}$/', '', $partner->images->image_cover) ?? null,  
            ],
        ];  
    }
}
