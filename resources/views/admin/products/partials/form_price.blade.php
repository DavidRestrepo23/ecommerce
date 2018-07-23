<br>
<div class="form-group">
    <div class="col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="callout callout-info">
                    <p>Para crear más precios especificos debes guardar primero.</p>
                </div>
            </div>
            <div class="card-body new-price">
                <div class="row">
                   <div class="col-xs-12 col-sm-3">
                       {!! Form::label('group_id', __('¿Para que grupo?')) !!}
                       {!! Form::select('group_id', $group_user, old('group_id') ,['class' => 'form-control']) !!}
                       @if ($errors->has('group_id'))
                       <span class="help-block">
                           <strong>{{ $errors->first('group_id') }}</strong>
                       </span>
                       @endif
                   </div>
                   <div class="col-xs-12 col-sm-2">
                        {!! Form::label('price_specific',  __('Precio ')) !!} <small>(Sin impuesto inc.)</small>
                        {!! Form::number('price_specific',  old('price_specific') ,['class' => 'form-control']) !!}
                        @if ($errors->has('price_specific'))
                       <span class="help-block">
                           <strong>{{ $errors->first('price_specific') }}</strong>
                       </span>
                       @endif
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        {!! Form::label('discount',  __('Aplicar descuento de')) !!}
                        {!! Form::number('discount',  old('discount') ,['class' => 'form-control', 'placeholder' => '15']) !!}
                        @if ($errors->has('discount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('discount') }}</strong>
                        </span>
                       @endif
                    </div>
                    <div class="col-xs-12 col-sm-2">
                            {!! Form::label('rate_specific',  __('Impuesto')) !!} <small>(IVA)</small>
                            {!! Form::select('rate_specific', ['1.19' => '19%'], old('rate_specific'), ['class' => 'form-control',  'placeholder' => 'Seleccione']) !!}
                            @if ($errors->has('rate_specific'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rate_specific') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($product)
    <price-specifics productid="{{ $product->id }}"></price-specifics> 
@endif

<!-- PENSAR EN HACER CON VUE-->