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


class ApiController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products
        ]);
    }


    /**
     * Get price Specifcs on product
     * @param  int  $id
     */
    public function product_prices($id)
    {
        $product = Product::with('price_specifics')->find($id);
        $prices = $product->price_specifics()->with('group')->get();
        $groupsUser = GroupUser::all();
        $priceCollection = new PriceSpecificCollection($prices);
        return response()->json([
            'prices' => $priceCollection->collection,
            'groups' => $groupsUser
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
     * Update price specifics product
     * 
     * @param  int  $id
     */
    public function update_price_specifics(Request $request, $id)
    {
        $price_specific = PriceSpecific::find($id);
        $price_discount = ($request->price * $request->discount) / 100;
        $price = $request->price - $price_discount;
        $tax = $request->tax;
        $price_tax = $price * $tax;
        if ($price_tax === 0) {
            $price_tax = $price;
        }

        $price_specific->fill(['price' => $price, 'price_tax' => $price, 'discount' => $request->discount])->save();

        return response()->json([
            'response' => $price
        ]);
    }




}
