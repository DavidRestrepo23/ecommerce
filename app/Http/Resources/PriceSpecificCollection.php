<?php

namespace App\Http\Resources;

use App\GroupUser;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PriceSpecificCollection extends ResourceCollection
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
                $group = GroupUser::find($data->group_id);
                return[
                    'id' => $data->id,
                    'humanPrice' => "$ ".number_format($data->price),
                    'humanTax' => "$ ".number_format($data->price_tax),
                    'price' => $data->price,
                    'price_tax' => $data->price_tax,
                    'discount' => $data->discount,
                    'group_id' => $data->group_id,
                    'group' => $group->name,
                ];
            })
        ];
    }
}
