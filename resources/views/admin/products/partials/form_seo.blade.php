<br>
<div class="form-group">
    <div class="col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="callout callout-info">
                    <p>Mejora el posicionamiento de tu tienda y cómo la página del producto aparecerá en los resultados de los motores de búsqueda.</p>
                </div>
            </div>
            <div class="card-body new-price">
                <div class="row">
                   <div class="col-xs-12 col-sm-6">
                       {!! Form::label('meta_description', __('Meta Descripción')) !!} <small>Al menos 160 caracteres</small>
                       {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'rows' => '3', 'maxlength' => '160']) !!}
                       @if ($errors->has('meta_description'))
                       <span class="help-block">
                           <strong>{{ $errors->first('meta_description') }}</strong>
                       </span>
                        @endif
                   </div>
                   <div class="col-xs-12 col-sm-6">
                        {!! Form::label('meta_keywords', __('Meta Palabras clave')) !!}
                        {!! Form::textarea('meta_keywords', old('meta_keywords'), ['class' => 'form-control', 'rows' => '3']) !!}
                        @if ($errors->has('meta_keywords'))
                       <span class="help-block">
                           <strong>{{ $errors->first('meta_keywords') }}</strong>
                       </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
