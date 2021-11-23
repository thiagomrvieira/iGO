<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartProductCollection extends ResourceCollection
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
            'partner' => [
                'id'   => $this->collection->first()->product->partner->id,
                'name' => $this->collection->first()->product->partner->name,
            ],
            'products'       => $this->collection,
            'total_products' => $this->collection->sum('quantity'),
            'total_amount'   => ($this->collection->count() > 0 ? $this->collection->first()->totalAmount() : 0) ?? null,
        ];
    }


}
