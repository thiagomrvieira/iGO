<?php

namespace App\Http\Resources;

use App\Models\PartnerCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $bestCampaign = $this->bestCampaign();
        $address      = $this->address;

        return [
            'id'                  => $this->id,
            'company_name'        => $this->company_name,
            'responsible_name'    => $this->name,
            'email'               => $this->email,
            'phone_number'        => $this->phone_number,
            'mobile_phone_number' => $this->mobile_phone_number,
            'tax_number'          => $this->tax_number,
            'category'            => new PartnerCategoryResource($this->mainCategory),
            'sub_categories'      => PartnerCategoryResource::collection($this->subCategories),
            'active'              => $this->active,
            'average_order_time'  => $this->average_order_time,
            'premium'             => $this->premium,
            'account_created_at'  => $this->created_at,
            'account_approved_at' => $this->approved_at,
            'images'              => new PartnerImageResource($this->images),
            'total_products'      => $this->products->count(),
            'total_reviews'       => $this->reviewsAndRatings->count('review'),
            'rating'              => $this->reviewsAndRatings->avg('rate'),
            'campaign'            => [
                'id'          => $bestCampaign->id           ?? null,
                'name'        => $bestCampaign->name         ?? null,
                'description' => $bestCampaign->description  ?? null,
            ],
            'address' => [
                'line_1'    => $address->line_1       ?? null,
                'line_2'    => $address->line_2       ?? null,
                'county'    => $address->county->name ?? null,
                'locality'  => $address->locality     ?? null,
                'post_code' => $address->post_code    ?? null,
                'country'   => $address->country      ?? null,
            ]
        ]; 
    }
}


      
    