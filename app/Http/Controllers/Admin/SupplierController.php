<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierStoreRequest;
use App\Http\Requests\SupplierUpdateRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::OrderBy('id', 'desc')->get();
        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $supplier = null;
        return view('admin.suppliers.create', compact('supplier'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierStoreRequest $request)
    {
        $supplier = Supplier::create($request->all());
        if($request->file('logo')){
            $path = \Storage::disk('public')->put('images/suppliers', $request->file('logo'));
            $supplier->fill(['logo' => asset($path)])->save();
        }
        return redirect()->route('suppliers.edit', $supplier->id)
               ->with('response', 'Proveedor creado con éxito');
    }

    public function show($id){
        
        $supplier = Supplier::find($id);

        return view('admin.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierUpdateRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->fill($request->all())->save();

        if($request->file('logo')){
            $path = \Storage::disk('public')->put('images/suppliers', $request->file('logo'));
            $supplier->fill(['logo' => asset($path)])->save();
        }
        return back()
               ->with('response', 'Proveedor editado con éxito');

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
