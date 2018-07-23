<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {    
      
        $category = Category::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
        ]);

        if($request->file('file')){
            $path = \Storage::disk('public')->put('images', $request->file('file'));
            $category->fill(['file' => asset($path)])->save();
        }

        return back()->with('response', 'Categoria creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        
        if(!$category)
            abort(404);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {   
        $category = Category::find($id);
        
        $category->fill([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
        ])->save();


        if($request->file('file')){
            $path = \Storage::disk('public')->put('images', $request->file('file'));
            $category->fill(['file' => asset($path)])->save();
        }

        return back()->with('response', 'Categoria editada con éxito');

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


    public function changeStatus(Request $request){
        if($request->ajax()){
            
            $status = $request->_status;
            
            $category = Category::find($request->_categoryId);
            $category->fill(['status' => $status])->save();
            
            return response()->json([
                'res' => 'Categoria actualiza con éxito',
            ]);
        }

        abort(401);
    }


}
