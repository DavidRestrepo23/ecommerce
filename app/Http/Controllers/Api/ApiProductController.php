<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PriceSpecificCollection;
use App\Product;
use App\ProductImage;
use App\Category;
use App\GroupUser;
use App\PriceSpecific;


class ApiProductController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products
        ]);
    }


    /**
     * Destroy file product images
     * @param  int  $id
     */
    public function destroy_product_images($id)
    {
        ProductImage::destroy($id);
        return response()->json([
            'response' => 'Imagen Eliminada'
        ]);
    }

    /**
     * Update status product
     * @param  int  $id
     */
    public function update_status(Request $request,$id){
        $product = Product::find($id);
        $product->fill(['status' => $request->status])->save();
        return response()->json([
            'response' => 'Producto editado con éxito',
        ]);
    }

}
