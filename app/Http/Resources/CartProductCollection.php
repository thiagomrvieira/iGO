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
        $totalAmount = 0;
        foreach ($this->collection as $collection) {
            $totalAmount += ($collection->quantity * $collection->product->price);
        }

        return [
            'data'         => $this->collection,
            'total_amount' => $totalAmount,
        ];

        
    }


}
