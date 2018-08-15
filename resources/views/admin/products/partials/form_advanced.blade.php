<br>
<div class="card">
    <div class="card-header">
            <i class="fa fa-barcode" aria-hidden="true"></i> Opciones del producto
    </div>
    <div class="card-body">
            <div class="form-group">
                    {!! Form::label('reference', 'Código de referencia') !!}
                    {!! Form::text('reference', old('reference') , ['class' => 'form-control']) !!}
                    <strong class="help-block reference"></strong>
                 </div>
                 <br>
                 <div class="form-group">
                    {!! Form::label('stock', 'Cantidad disponible (existencia) ') !!}
                    {!! Form::number('stock', old('stock') , ['class' => 'form-control', 'min' => 1]) !!}
                    <strong class="help-block stock"></strong>
                </div>
                <br>
                <div class="form-group">
                    {!! Form::label('supplier_id', 'Marca y Proveedor') !!}
                    {!! Form::select('supplier_id', $suppliers, old('supplier_id'), ['class' => 'form-control',  'placeholder' => 'Seleccione']) !!}
                    <strong class="help-block supplier_id"></strong>
                </div>
                <br>
    </div>
</div>
<div class="form-group">
    <div class="card">
        <div class="card-header"><i class="fa fa-usd" aria-hidden="true"></i> Precios</div>
        <div class="card-body">
            <div class="row">
                @if($product)
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('price', 'Precio sin IVA') !!}
                    {!! Form::number('price', $product->price , ['class' => 'form-control',  'placeholder' => 'Solo números', 'min' => '0']) !!}
                    <br>
                    {!! Form::label('price', 'Precio IVA incluido') !!}
                    {!! Form::number('price_tax', $product->price_tax , ['class' => 'form-control',  'placeholder' => 'Solo números', 'min' => '0']) !!}
                    <strong class="help-block price"></strong>
                </div>
                @else
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('price', 'Precio sin IVA') !!}
                    {!! Form::number('price', old('price') , ['class' => 'form-control',  'placeholder' => 'Solo números', 'min' => '0']) !!}
                </div>
                @endif
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('rate', 'Impuesto') !!} <small>(IVA )</small>
                    {!! Form::select('rate', ['1.19' => '19%'], old('rate'), ['class' => 'form-control',  'placeholder' => 'Seleccione']) !!}
                    <strong class="help-block rate"></strong>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="form-group">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-folder" aria-hidden="true"></i> Categoría y Subcategorías
        </div>
        <div class="card-body">
            @if($product && $product->category)
                <get-categories-edit-component categoryindex="{{ $product->category->id }}" productid="{{ $product->id }}"></get-categories-edit-component>
            @else
            <get-categories-component></get-categories-component>
           @endif
        </div>
    </div>
</div>

