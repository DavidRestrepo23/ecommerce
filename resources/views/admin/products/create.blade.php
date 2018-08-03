@extends('layouts.admin')
@section('page_title', 'Crear Producto ')
@section('styles')
    <link href="{{asset('vendor/upload/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/switch.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/select2/select2.css') }}">
@endsection
@section('route')
<a href="{{ route('product.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="alert alert-danger alert-dismissible" style="display:none">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-ban"></i> Alerta!</h5>
        <div class="errors">

        </div>
</div>
{!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true, 'id' => 'form-product']) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="card card-default">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Ajustes básicos</a>
                        <a class="nav-item nav-link disabled" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Precios</a>
                        <a class="nav-item nav-link disabled" id="nav-combination-tab" data-toggle="tab" href="#nav-combination" role="tab" aria-controls="nav-combination" aria-selected="false">Combinaciones</a>
                        <a class="nav-item nav-link" id="nav-seo-tab" data-toggle="tab" href="#nav-seo" role="tab" aria-controls="nav-seo" aria-selected="false">SEO</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                     <div class="row">
                         <div class="col-xs-12 col-sm-9">
                                @include('admin.products.partials.form_basic')
                         </div>
                         <div class="col-xs-12 col-sm-3">
                                @include('admin.products.partials.form_advanced')                                
                         </div>
                     </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        @include('admin.products.partials.form_price')
                    </div>
                    <div class="tab-pane fade" id="nav-combination" role="tabpanel" aria-labelledby="nav-combination-tab"></div>
                    <div class="tab-pane fade" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab">
                        @include('admin.products.partials.form_seo')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="card card-primary"> 
            <div class="card-body">
                
                <div class="row">
                    <div class="col-xs-6 col-sm-1">
                        <h5 style="margin-top:5px;margin-left:30px">Visible</h5>
                    </div>
                    <div class="col-xs-6 col-sm-1">
                        <label class="switch">
                                {!! Form::checkbox('status', old('status')) !!}
                                <span class="slider round"></span>
                        </label> 
                    </div>
                </div>
                
                {!! Form::button('<i id="icon" class="fa fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-info pull-right']) !!}
                <button class="btn btn-default pull-right" style="margin-right:20px"><i class="fa fa-plus-circle"></i> Agregar nuevo producto</button>
                <button class="btn btn-default pull-right" style="margin-right:20px"><i class="fa fa-list"></i> Ir al catálogo </button>

            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}   
@endsection
@section('scripts')
    <script src=" {{asset('vendor/upload/js/fileinput.js')}}" type="text/javascript"></script>
    <script src=" {{asset('vendor/upload/js/locales/es.js')}}" type="text/javascript"></script>
    <script src="{{ asset('vendor/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/products.js') }}"></script>
@endsection

