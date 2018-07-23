<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiCategoryController extends Controller
{
    /**
     * Obtener todas la categorias para mostrar en una lista 
     * de radiobutton al momento de crear.
     * 
     */
    public function categories(){
        $categories = Category::with('sub_categories')->get();
        return response()->json([
            'categories' => $categories
        ]);
    }

    /**
     * Obtener las subcategorias asociadas a este producto para
     * mostrarlas en un checkbox al momento de editar.
     * 
     * @param  int  $id
     */
    public function subcategories($id){
        $product= Product::find($id);
        return response()->json([
            'product' => $product->sub_categories->pluck('id')
        ]);
    }
}
