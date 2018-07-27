<?php

namespace App\Http\Controllers\Api;

use App\ProductCombination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCombinationCollection;
use App\Product;

class ApiCombinationController extends Controller
{   
    /**
     * Obtener todas las combinaciones del producto
     */
    public function get_combinations($id){
        $product = Product::find($id);
        $get_combinations = ProductCombination::where('product_id', $product->id)->orderBy('combination', 'DESC')->get();
        $combinations = new ProductCombinationCollection($get_combinations);
        
        return response()->json([
            'combinations' => $combinations,
            'images' => $product->images()->get(),
        ]);
    }

  
}
