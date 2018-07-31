<?php

namespace App\Http\Controllers\Api;

use App\GroupCombination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiGroupCombinationController extends Controller
{
    public function get_group_combinations($id){
        $group_combinations = GroupCombination::where('product_id', $id)->get();
        return response()->json([
            'group_combinations' => $group_combinations
        ]);
    }
}
