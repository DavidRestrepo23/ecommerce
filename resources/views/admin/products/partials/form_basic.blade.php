@csrf
<div class="card">
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('title', 'Nombre del producto') !!}
            {!! Form::text('title', old('title') , ['class' => 'form-control', 'id' => 'title']) !!}
            <strong class="help-block title"></strong>
        
        </div>
    </div>
</div>
@if(!$product)
<div class="form-group">
    <div class="file-loading">
        {{ Form::file('images[]', ['class' => 'form-control', 'multiple', 'id' => 'file-es', 'data-min-file-count' => '1']) }}
        <strong class="help-block images"></strong>
    </div>  
</div>
@else
<div class="form-group">
    <button type="button" onclick="getProductImages('{{ $product->images }}')" id="btn-start" style="display:none"></button>
    {{ Form::file('images[]', ['class' => 'form-control', 'multiple', 'id' => 'file-es-2', 'data-min-file-count' => '1']) }}
</div>
@endif

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-summary-tab" data-toggle="tab" href="#nav-summary" role="tab" aria-controls="nav-summary" aria-selected="true">Resumen</a>
        <a class="nav-item nav-link" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="false">Descripción</a>
    </div>
</nav>
<div class="card">
    <div class="card-body">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-summary" role="tabpanel" aria-labelledby="nav-summary-tab">
                <div class="form-group">
                    <div class="col-xs-12 col-sm-12">
                        {{Form::textarea('summary', old('summary') ,['id' => 'summary', 'data-toggle' => 'tooltip', 'rows' => '3' ])}}
                        <strong class="help-block summary"></strong>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                <div class="col-xs-12 col-sm-12">
                        {{Form::textarea('description', old('description') ,['id' => 'description', 'data-toggle' => 'tooltip', 'rows' => '3' ])}}
                        <strong style="font-size:11pt" class="help-block description"></strong>
                </div>
            </div>
        </div>
    </div>
</div>
   
@if($product)
    <feature-products-component :productid="{{ $product->id }}"></feature-products-component>
@else
    <feature-products-component></feature-products-component>
@endif




