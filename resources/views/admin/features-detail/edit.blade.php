@extends('layouts.admin')
@section('page_title', 'Editar Atributo')
@section('route')
<a href="{{ route('features.index') }}" class="nav-link"><i class="fa fa-angle-double-left"></i> Volver atrás</a> 
@endsection
@section('content')
<div class="col-12">
    <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-plus-circle"></i> Editar Atributo</h4>
            </div>    
            <div class="card-body">
               {!! Form::model($feature_detail, ['route' => ['features-details.update', $feature_detail->id] , 'method' => 'put']) !!}
                    @include('admin.features-detail.partials.form')
               {!! Form::close() !!}
            </div>
        </div>
</div>     
@endsection



