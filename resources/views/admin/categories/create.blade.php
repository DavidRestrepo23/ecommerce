@extends('layouts.admin')
@section('page_title', 'Añadir Categoría')
@section('route')
<a href="{{ route('categories.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-tags"></i> Nueva Categoría</h4>
            </div>    
            <div class="card-body">
               {!! Form::open(['route' => 'categories.store', 'method' => 'post', 'files' => true]) !!}
                    @include('admin.categories.partials.form')
               {!! Form::close() !!}
            </div>
        </div>
</div>
       
@endsection



