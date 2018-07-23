<?php 

namespace App\Traits;


use App\ShoppingCart;


trait TraitSession {


    public function findOrCreate(){
       
        $shopping_cart_id = \Session::get('shopping_cart_id');
        $shopping_cart = ShoppingCart::findOrCreateSessionId($shopping_cart_id);
        \Session::put('shopping_cart_id', $shopping_cart->id);
        \Session::save();

        return $shopping_cart;
    }


}

?>