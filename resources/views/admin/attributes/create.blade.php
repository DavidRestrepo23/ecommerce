@extends('layouts.admin')
@section('page_title', 'Crear Atributo')
@section('route')
<a href="{{ route('attributes.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-plus-circle"></i> Nueva Atributo</h3>
            </div>    
            <div class="card-body">
               {!! Form::open(['route' => 'attributes.store', 'method' => 'post']) !!}
                @include('admin.attributes.partials.form')
               {!! Form::close() !!}
            </div>
        </div>
</div>
       
@endsection



