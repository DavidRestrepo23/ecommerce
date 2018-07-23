<?php

namespace App\Providers;

use Auth;
use App\ShoppingCart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Traits\TraitSession;
use App\Traits\TraitNewSession;


class AppServiceProvider extends ServiceProvider
{   

    use TraitSession, TraitNewSession;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
    
        View::composer('*', function($view){
            // $shopping_cart = $this->findOrCreate(); //Creado con un trait
            // $view->with('productsCount', $shopping_cart->productsCount());

            $cart = $this->findOrCreateSession();
            $productsCount = session('cart')->count();
            $view->with('productsCount', $productsCount);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
