@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-sm-center">
        <div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
            <div class="card">
                <div class="card-header">
                    {{ $product->title }}
                </div>
                <div class="card-body">
                    {{ $product->description }}
                    <hr>
                    {{-- {!! Form::open(['url' => '/shopping_cart', 'method' => 'POST']) !!}
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="submit" class="btn btn-success" value="Agregar Producto">
                    {!! Form::close() !!} --}}
                    <br><br>
                    <add-btn-products-component product="{{ $product->id }}"></add-btn-products-component>
                    @include('admin.products.delete')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection