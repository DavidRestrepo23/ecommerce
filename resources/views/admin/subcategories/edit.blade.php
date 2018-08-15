@extends('layouts.admin')
@section('page_title', 'Editar Subcategoría')
@section('route')
<a href="{{ route('categories.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-tag"></i> Editar Subcategoría</h4>
            </div>    
            <div class="card-body">
               {!! Form::model($subcategory, ['route' => ['subcategory.update', $subcategory->id] , 'method' => 'put']) !!}
                    @include('admin.subcategories.partials.form')
               {!! Form::close() !!}
            </div>
        </div>
</div>     
@endsection



