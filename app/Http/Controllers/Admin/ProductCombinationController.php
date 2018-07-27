<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCombination;
use App\ProductCombinationImages;
use App\Http\Requests\ProductCombinationStoreRequest;


class ProductCombinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        if($request->ajax()){
            $product = Product::find($request->productId);
            $combinations = $request->combinations;
            $success = '';
            foreach ($combinations as $key => $combination) {
                $product_combinations = ProductCombination::where('combination', json_encode($combination))->where('product_id', $product->id)->count();
                    if($product_combinations >= 1){
                        $success = 'Error';
                    }else{
                        $product_combination = ProductCombination::create([
                            'combination' => json_encode($combination),
                            'key_color' => $request->key_color,
                            'product_id' => $product->id,
                            'price' => $product->price,
                            'stock' => $product->stock,
                            'images' => $request->images
                        ]);
                        
                        $success = 'ok';
                    }
                }
            
                return response()->json([
                    'response' => $success
                ]);
        }
        abort(401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
