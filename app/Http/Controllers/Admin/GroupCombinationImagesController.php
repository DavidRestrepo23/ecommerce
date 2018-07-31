<?php

namespace App\Http\Controllers\Admin;

use App\GroupCombinationImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class GroupCombinationImagesController extends Controller
{
    public function store(Request $request){
        if($request->ajax()){
            try{
                DB::beginTransaction();
                $images = $request->_images;
                foreach($images as $key => $image){
                    $combination_images = GroupCombinationImages::where('url', $image)->where('group_combination_id', $request->_group_combination_id)->count();
                        if($combination_images == 1){
                            GroupCombinationImages::where('group_combination_id', $request->_group_combination_id)->delete();  
                            GroupCombinationImages::create([
                                'url' => $image,
                                'group_combination_id' => $request->_group_combination_id
                            ]); 
                        }else{
                            GroupCombinationImages::create([
                                'url' => $image,
                                'group_combination_id' => $request->_group_combination_id
                            ]);
                        }

                        
                    }
                $success = true;
            }catch(\Exception $ex){
                DB::rollBack();
                $success = $ex->getMessage();
                return response()->json([
                    'errors' => $success
                ]);
            }

            if($success == true){
                DB::commit();
                return response()->json([
                    'images' => $request->_images, 
                ]);
            }
        }
        abort(401);
    }


    public function show($id){
        $images =  GroupCombinationImages::where('group_combination_id', $id)->pluck('url');
        return response()->json([
            'images' => $images,
        ]);
    }


}
