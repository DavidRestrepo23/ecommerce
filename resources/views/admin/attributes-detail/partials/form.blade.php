@csrf
<div class="row">
    <div class="col-xs-12 col-sm-2"></div>
    <div class="col-xs-12 col-sm-8" style="margin-top:15px">
        <div class="form-group">
            {!! Form::label('attribute_id', __('Atributo padre')) !!}
            {!! Form::select('attribute_id', $attributes, old('attribute_id') ,['class' => 'form-control']) !!}
            @if ($errors->has('attribute_id'))
            <span class="help-block">
                <strong>{{ $errors->first('attribute_id') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('name', __('Nombre del atributo')) !!}
            {!! Form::text('name', old('name') ,['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('hexa', __('Código hexadecimal')) !!} <small class="pull-right">* Solo para colores</small>
            {!! Form::text('hexa', old('hexa') ,['class' => 'form-control'.($errors->has('hexa') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('hexa'))
            <span class="help-block">
                <strong>{{ $errors->first('hexa') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<div class="card-footer" style="margin-top:35px">
    <div class="row pull-right">
        <div class="col-xs-12" style="padding:10px">
            {!! Form::button('<i class="fa fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-info']) !!}
        </div>
    </div>
</div>

