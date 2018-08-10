@extends('layouts.admin')
@section('page_title', 'Editar Proveedor')
@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/select2/select2.css') }}">
@endsection
@section('route')
<a href="{{ route('suppliers.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
{!! Form::model($supplier, ['route' => ['suppliers.update', $supplier->id], 'method' => 'PUT', 'files' => true]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-info-circle"></i> Datos básicos</h3>
            </div>    
            <div class="card-body">
                @include('admin.suppliers.partials.formInfo')
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-map-marker"></i> Ubicación</h3>
            </div>    
            <div class="card-body">
                @include('admin.suppliers.partials.formLocate')
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="card"> 
            <div class="card-body">
                {!! Form::button('<i class="fa fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-info pull-right']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}   
@endsection
@section('scripts')
    <script src="{{ asset('vendor/adminlte/plugins/select2/select2.min.js') }}"></script>
    <script>
        $('.select2').select2({
            placeholder: "Seleccione una opción",
        });
    </script>
@endsection

