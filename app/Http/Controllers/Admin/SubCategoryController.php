<?php

namespace App\Http\Controllers\Admin;

use App\Subcategory;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;

class SubcategoryController extends Controller
{   

    public function __construct(){
        $this->middleware('dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $subcategory = null;
        return view('admin.subcategories.create', compact('categories', 'subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryStoreRequest $request)
    {
        $subcategory = Subcategory::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);

        if($request->file('file')){
            $path = \Storage::disk('public')->put('images/categories', $request->file('file'));
            $subcategory->fill(['file' => asset($path)])->save();
        }

        return back()->with('response', 'Subcategoria creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if(!$category)
            abort(404);

        $subCategories = $category->sub_categories()->get();
        return view('admin.subcategories.index', compact('subCategories', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $subcategory = Subcategory::find($id);
        if(!$subcategory)
            abort(404);
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryUpdateRequest $request, $id)
    {   
        $subcategory = Subcategory::find($id);
        $subcategory->fill([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'category_id' => $request->category_id
        ])->save();

        if($request->file('file')){
            $path = \Storage::disk('public')->put('images/categories', $request->file('file'));
            $subcategory->fill(['file' => asset($path)])->save();
        }

        return redirect()
                ->route('subcategory.edit', $subcategory->id)
                ->with('response', 'Subcategoria Editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


   /**
     * Cambiar el estado de la categoría desde el listado
     * 
     */
    public function changeStatus(Request $request){
        if($request->ajax()){
            
            $status = $request->_status;
            
            $category = Subcategory::find($request->_subcategoryId);
            $category->fill(['status' => $status])->save();
            
            return response()->json([
                'res' => 'Subcategoría actualiza con éxito',
            ]);
        }

        abort(401);
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
