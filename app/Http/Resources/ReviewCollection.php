<?php

namespace App\Http\Resources;

use App\Models\PartnerCategory;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'partner'       => $this->collection->first()->partner->name,
            'category_icon' => config('app.url') . PartnerCategory::where('id', $this->collection->first()->partner->category_id)->first()->image ?? 
                                    'storage/assets-mobile/default_32',
            'total_reviews' => $this->collection->count(),
            'reviews'       => $this->collection
        ];
    }
}
