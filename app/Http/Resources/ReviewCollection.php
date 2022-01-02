<?php

namespace App\Http\Resources;

use App\Models\PartnerCategory;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

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
        $partner = $this->collection->first()->partner ?? Auth::user()->partner;
        $partnerCategory = $partner->mainCategory;
        
        return [
            'partner'       => $partner?->name,
            'category_icon' => config('app.url') . 'storage' . DIRECTORY_SEPARATOR . 'assets-mobile' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $partnerCategory?->image) 
                                                ?? 'storage' . DIRECTORY_SEPARATOR . 'assets-mobile' . DIRECTORY_SEPARATOR . 'default_32',
            'total_reviews' => $this->collection->count(),
            'rating'        => $partner->reviewsAndRatings->avg('rate'),
            'reviews'       => $this->collection
        ];
    }
}
