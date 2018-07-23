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
                    {!! Form::number('stock', old('stock') , ['class' => 'form-control']) !!}
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
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('price', 'Precio') !!} <small>(Sin imp. inc.)</small>
                    {!! Form::number('price', old('price') , ['class' => 'form-control',  'placeholder' => 'Solo números', 'min' => '0']) !!}
                    <strong class="help-block price"></strong>
                    <br>
                    
                </div>
                <div class="col-xs-12 col-sm-6">
                    {!! Form::label('rate', 'Impuesto') !!} <small>(IVA )</small>
                    {!! Form::select('rate', ['1.19' => '19%'], old('rate'), ['class' => 'form-control',  'placeholder' => 'Seleccione']) !!}
                    <strong class="help-block rate"></strong>
                </div>
                <small>Para agregar un precio especifico vaya a la pestaña "Precio"</small>
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
           @if($product)
            <category-edit-component categoryindex="{{ $product->category->id }}" productid="{{ $product->id }}"></category-edit-component>
           @else
            <category-create-component></category-create-component>
           @endif
        </div>
    </div>
</div>

