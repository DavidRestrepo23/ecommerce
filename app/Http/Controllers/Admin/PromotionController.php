<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionsStoreRequest;
use App\Http\Resources\PromotionsCollection;


class PromotionController extends Controller
{
    
    public function store(PromotionsStoreRequest $request){
        if($request->ajax()){
            $promotion = Promotion::create($request->all());
            return response()->json([
                'response' => 'Promoción creada con éxito',
            ]);
        }
        abort(401);
    }

    public function show($id){
        $getPromotions = Promotion::where('product_id', $id)->get();
        return new PromotionsCollection($getPromotions);
    }
    
}
