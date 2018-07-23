<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingCartController extends Controller
{
    public function show(Request $request){
        return view('shopping_cart.show');
     }
 
     public function productsInCart(){
         $products = \Session()->get('cart');
         return response()->json([
             'cart' => $products
         ]);
     }
}
