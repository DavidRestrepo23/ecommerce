<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeDetailStoreRequest;
use App\Http\Requests\AttributeDetailUpdateRequest;

class AttributeDetailController extends Controller
{   

    public function __construct(){
        $this->middleware('dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $attributes_details = AttributesDetail::all();
        return view('admin.attributes-detail.index', compact('attributes_details'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $attributes = Attribute::pluck('name', 'id');
        return view('admin.attributes-detail.create',  compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeDetailStoreRequest $request)
    {
        AttributeDetail::create($request->all());
        return back()->with('response', 'Atributo creado con éxito');
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribute = Attribute::find($id);
        $attributes_details = $attribute->attribute_details()->get();
        return view('admin.attributes-detail.index', compact('attributes_details', 'attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute_detail = AttributeDetail::find($id);

        if(!$attribute_detail)
            abort(404);

        $attributes = Attribute::pluck('name', 'id');
        return view('admin.attributes-detail.edit', compact('attribute_detail', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeDetailUpdateRequest $request, $id)
    {   
        $attribute_details = AttributeDetail::find($id);
        $attribute_details->fill($request->all())->save();
        return back()->with('response', 'Atributo editado con éxito');
    }



}
