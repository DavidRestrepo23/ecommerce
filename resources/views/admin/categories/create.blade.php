@extends('layouts.admin')
@section('page_title', 'Crear Categoría')
@section('route')
<a href="{{ route('category.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-plus-circle"></i> Nueva Categoría</h3>
            </div>    
            <div class="card-body">
               {!! Form::open(['route' => 'category.store', 'method' => 'post', 'files' => true]) !!}
                @include('admin.categories.partials.form')
               {!! Form::close() !!}
            </div>
        </div>
</div>
       
@endsection



