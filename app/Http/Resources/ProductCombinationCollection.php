<?php

namespace App\Http\Resources;

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
                $images =  $element->images;
                $images_replace_1 = str_replace('[', '', $images);
                $images_replace_2 = str_replace(']', '', $images_replace_1);
                $images_replace_3 = str_replace('"', '', $images_replace_2);
                $images_array = explode(',', $images_replace_3);
                return [
                    'id' => $element->id,
                    'combination' => $combination,
                    'stock' => $element->stock,
                    'reference' => $element->reference,
                    'price' => $element->price,
                    'humanPrice' => "$ ".number_format($element->price),
                    'discount' => $element->discount,
                    'image' => $images_array[0]
                ];
            }),
        ];
  
    }
}
