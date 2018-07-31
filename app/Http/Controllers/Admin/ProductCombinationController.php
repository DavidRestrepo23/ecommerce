<?php

namespace App\Http\Controllers\Admin;


use App\Product;
use App\ProductCombination;
use App\ProductCombinationImages;
use App\GroupCombination;
use App\GroupCombinationImages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCombinationStoreRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductCombinationUpdateRequest;



class ProductCombinationController extends Controller
{   

    public function __construct(){
        $this->middleware('dashboard');
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
            try{
                DB::beginTransaction();
                $product = Product::find($request->productId);
                $combinations = $request->combinations;
                $group_combination_count = GroupCombination::where('color', $request->key_color)->where('product_id', $product->id)->count();
                $group_combination_id = null;
                if($group_combination_count == 0){
                    $group_combination = GroupCombination::create(['color' => $request->key_color, 'product_id' => $product->id]);
                    $group_combination_id = $group_combination->id;
                }else{
                    $group_combination = GroupCombination::where('color', $request->key_color)->where('product_id', $product->id)->pluck('id');
                    $group_combination_id = $group_combination[0];
                }
                
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
                                'group_combination_id' => $group_combination_id
                            ]);
                            
                            $success = true;
                        }
                    }
                
            }catch(\Exception $ex){
                DB::rollBack();
                $success = $ex->getMessage();
                return response()->json([
                    'error' => $success
                ]);
            }
            
            if($success == true){
                DB::commit();
                return response()->json([
                    'response' => 'ok',
                ]);
            }       
        }
        abort(401);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCombinationUpdateRequest $request, $id)
    {
       
            $product_combination = ProductCombination::find($id);
            $product_combination->fill($request->all())->save();
            return response()->json([
                'response' => 'ok'
            ]);
        

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
    }
}
