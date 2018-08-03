<?php

namespace App\Http\Controllers\Admin;

use App\PriceSpecific;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PriceSpecificCollection;


class PriceSpecificController extends Controller
{
    public function store(Request $request){
        if($request->ajax()){
            $validate = PriceSpecific::where('product_id', $request->product_id)->where('group_id', $request->group_id)->count();
            if($validate == 1){
                return response()->json([
                    'response' => 'error',
                ]);
            }else{
                $prices = PriceSpecific::create($request->all());
                return response()->json([
                    'response' => 'ok',
                ]);
            }
        }
        abort(401);
    }


    public function show($id){
        $prices = PriceSpecific::where('product_id', $id)->get();
        $priceCollection = new PriceSpecificCollection($prices);
        return response()->json([
            'prices' =>  $priceCollection,
        ]);
    }

}
