<?php

namespace App\Http\Controllers\Api;

use App\Feature;
use App\Product;
use App\FeatureDetail;
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
        $feature_details = FeatureDetail::all();
        return response()->json([
            'details' => $feature_details,
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
        $feature_details = $product->feature_details()->get();

        return response()->json([
            'feature_details' => $feature_details
        ]);

    }
}
