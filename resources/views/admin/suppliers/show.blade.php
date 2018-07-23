@extends('layouts.admin')
@section('page_title')  
<img src="{{ $supplier->logo }}" alt="">
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/select2/select2.css') }}">
@endsection
@section('route')
<a href="{{ route('suppliers.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-info-circle"></i> Productos <span class="badge badge-dark">{{ $supplier->products->count() }}</span> </h3>
            </div>    
            <div class="card-body">
                <div class="row">
                    @foreach($supplier->products as $product)
                    <div class="col-xs-12 col-sm-3">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ $product->first_image->url }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{ $product->title }}</b></h5>
                                    <p class="card-text">Existencia <span class="badge badge-dark">{{ $product->stock }}</span></p>
                                    <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i> Modificar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection


