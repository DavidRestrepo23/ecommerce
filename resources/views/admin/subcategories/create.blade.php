@extends('layouts.admin')
@section('page_title', 'Crear Subcategoría')
@section('route')
<a href="{{ route('category.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-tags"></i> Nueva Subcategoría</h3>
            </div>    
            <div class="card-body">
               {!! Form::open(['route' => 'subcategory.store', 'method' => 'post', 'files' => true]) !!}
                @include('admin.subcategories.partials.form')
               {!! Form::close() !!}
            </div>
        </div>
</div>
       
@endsection



