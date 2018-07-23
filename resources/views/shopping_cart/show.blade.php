@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="card" style="width: 100%">
                <div class="card-header">
                        Mi carrito de compras
                </div>
                <div class="card-body">
                    <products-in-cart-component></products-in-cart-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection