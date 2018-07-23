@extends('layouts.admin')
@section('page_title', 'Editar Característica')
@section('route')
<a href="{{ route('features.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-plus-circle"></i> Editar Característica</h3>
            </div>    
            <div class="card-body">
               {!! Form::model($feature, ['route' => ['features.update', $feature->id] , 'method' => 'put']) !!}
                    @include('admin.features.partials.form')
               {!! Form::close() !!}
            </div>
        </div>
</div>     
@endsection



