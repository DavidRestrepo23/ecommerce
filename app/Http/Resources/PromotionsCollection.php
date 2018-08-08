<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PromotionsCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($data){
                return[
                    'id' => $data->id,
                    'humanPrice' => "$ ".number_format($data->price),
                    'humanPriceTotal' => "$ ".number_format($data->price_total),
                    'price' => $data->price,
                    'price_tax' => $data->price_tax,
                    'humanDiscount' => $data->discount.' %',
                    'discount' => $data->discount,
                    'start_at' => $data->start_at,
                    'ends_at' => $data->ends_at,
                ];
            })
        ];
    }
}
