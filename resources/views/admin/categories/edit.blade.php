@extends('layouts.admin')
@section('page_title', 'Editar Categoría')
@section('route')
<a href="{{ route('category.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-plus-circle"></i> Editar Categoría</h3>
            </div>    
            <div class="card-body">
               {!! Form::model($category, ['route' => ['category.update', $category->id] , 'method' => 'put']) !!}
                    <img src="{{ $category->file }}" width="120px" style="margin-top:10px" class="pull-right" alt="">
                    @include('admin.categories.partials.form')
               {!! Form::close() !!}
            </div>
        </div>
</div>
       
@endsection



