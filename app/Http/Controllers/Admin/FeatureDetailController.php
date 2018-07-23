<?php

namespace App\Http\Controllers\Admin;
use App\FeatureDetail;
use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureDetailStoreRequest;
use App\Http\Requests\FeatureDetailUpdateRequest;

class FeatureDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $features_details = FeatureDetail::all();
        return view('admin.features-detail.index', compact('features_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $features = Feature::pluck('name', 'id');
        return view('admin.features-detail.create', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureDetailStoreRequest $request)
    {
        $feature_detail = FeatureDetail::create($request->all());
        return back()->with('response', 'Atributo agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feature = Feature::find($id);
        $features_details = $feature->feature_details()->get();
        return view('admin.features-detail.index', compact('features_details', 'feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature_detail = FeatureDetail::find($id);

        if(!$feature_detail)
            abort(404);

        $features = Feature::pluck('name', 'id');
        return view('admin.features-detail.edit', compact('feature_detail', 'features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureDetailUpdateRequest $request, $id)
    {   
        $feature_details = FeatureDetail::find($id);
        $feature_details->fill($request->all())->save();
        return back()->with('Característica editada con éxito');
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
