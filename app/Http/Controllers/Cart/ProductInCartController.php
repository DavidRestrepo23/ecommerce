<?php

namespace App\Http\Controllers\Cart;

use App\Product;
use App\ProductInCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ProductInCartController extends Controller
{
    public function store(Request $request){
        
        if($request->ajax()){
            $cart = session('cart');
            $product_id = $request->product_id;
            $product = null;

            if(!$cart->contains('id', $product_id)){
                $product = Product::find($product_id);
                $product->setAttribute('amount', 1);
                $cart->push($product);
            }else{
                $cart->map(function ($product) use ($product_id) {
                    if( $product->id == $product_id){
                        $product->amount += 1;
                    }
                });
            }
            session()->save();
                
            return response()->json([
                'cart' => $cart,
                'count' => $cart->count(),
            ]);
        }
        abort(401);
    }

    public function decrement(Request $request){
        
        if($request->ajax()){

            $cart = session('cart');
            $productId = $request->product_id;

            $cart->map(function($product) use ($productId){
                if($product->id == $productId){
                    $product->amount -= 1;
                }
            });

            session()->save();

            $filtered = $cart->reject(function ($product) {
                return $product->amount < 1;
            })->flatten();

           $cart2 = session()->put('cart', $filtered);

            return response()->json([
                'cart' => $cart,
                'count' => $cart->count(),
            ]);
        }
        abort(401);
    }
}
