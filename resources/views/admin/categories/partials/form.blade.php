@csrf
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            {!! Form::label('name', __('Nombre de la categoría')) !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control '.($errors->has('name') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('description', __('Descripción de la categoría')) !!}
            {!! Form::textarea('description', old('description'), ['class' => 'form-control '.($errors->has('description') ? ' is-invalid' : '' ), 'rows' => '5']) !!}
            @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            {!! Form::label('file', __('Imagen de la categoría')) !!}
            {!! Form::file('file', ['class' => 'form-control']) !!}
            @if ($errors->has('file'))
            <span class="help-block">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<div class="row pull-right">
    <div class="col-xs-12" style="padding:10px">
        {!! Form::button('<i class="fa fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-info']) !!}
    </div>
</div>

