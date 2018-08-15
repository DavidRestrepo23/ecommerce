@extends('layouts.admin')
@section('page_title', 'Editar Categoría')
@section('route')
<a href="{{ route('categories.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-tags"></i> Editar Categoría</h4>
            </div>    
            <div class="card-body">
               {!! Form::model($category, ['route' => ['categories.update', $category->id] , 'method' => 'put']) !!}
                    
                    @include('admin.categories.partials.form')

                    
                    

               {!! Form::close() !!}
            </div>
        </div>
</div>
       
@endsection



