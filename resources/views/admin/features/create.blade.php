@extends('layouts.admin')
@section('page_title', 'Crear Característica')
@section('route')
<a href="{{ route('features.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-plus-circle"></i> Nueva Característica</h4>
            </div>    
            <div class="card-body">
               {!! Form::open(['route' => 'features.store', 'method' => 'post']) !!}
                @include('admin.features.partials.form')
               {!! Form::close() !!}
            </div>
        </div>
</div>
       
@endsection



