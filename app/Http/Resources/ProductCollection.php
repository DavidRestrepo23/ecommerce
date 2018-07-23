<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($element){
                return [
                    'id' => $element->id,
                    'title' => $element->title,
                    'humanPrice' => "$ ".($element->price / 100),
                    'numberPrice' => $element->price,
                    'description' => $element->description,
                    'amount' => $element->amount,
                    'total' => "$ ".($element->price * $element->amount / 100),
                    'image' => $element->image_url,
                ];
            })
        ];
    }
}
