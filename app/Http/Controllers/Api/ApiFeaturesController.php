<?php

namespace App\Http\Controllers\Api;

use App\Feature;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiFeaturesController extends Controller
{
    /**
     * Obtiene los detalles de cada característica, para rellena dinamicamente 
     * un select multiple.
     * 
     */
    public function features()
    {
        $features = Feature::with('feature_details')->get();
        return response()->json([
            'features' => $features
        ]);
    }

    /**
     * Obtener los detalles de las características de este product.
     * 
     * @param  int  $id
     */
    public function feature_details($id)
    {
        $product = Product::find($id);

        $feature_details = $product->feature_details()->get()->pluck('id');

        return response()->json([
            'feature_details' => $feature_details
        ]);

    }
}
