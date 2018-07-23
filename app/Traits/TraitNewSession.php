<?php 

namespace App\Traits;


use App\ShoppingCart;
use Illuminate\Support\Collection;

trait TraitNewSession {


    public function findOrCreateSession(){
        
        if(!session()->has('cart')){
            session()->put('cart', new Collection);
            session()->save();
            return session('cart');
        }
    }


}

?>