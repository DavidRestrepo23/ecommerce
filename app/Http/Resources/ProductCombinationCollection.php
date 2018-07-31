<?php

namespace App\Http\Resources;

use App\Product;
use App\GroupCombinationImages;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCombinationCollection extends ResourceCollection
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
                $combination_string = $element->combination;
                $combination_decode = json_decode($combination_string);
                $combination = "Color: ". $combination_decode->color.", ".$combination_decode->key.": ".$combination_decode->value;
                $group_combination = GroupCombinationImages::where('group_combination_id', $element->group_combination_id)->get();
                return [
                    'id' => $element->id,
                    'combination' => $combination,
                    'stock' => $element->stock,
                    'reference' => $element->reference,
                    'price' => $element->price,
                    'price_tax' => $element->price_tax,
                    'humanPrice' => "$ ".number_format($element->price),
                    'humanPriceTax' => "$ ".number_format($element->price_tax),
                    'discount' => $element->discount,
                    'group_combination' => $group_combination
                    
                ];
            }),
        ];
  
    }
}
