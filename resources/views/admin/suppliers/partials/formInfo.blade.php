@csrf
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            {!! Form::label('contactName', __('Nombre del contacto (*) ')) !!}
            {!! Form::text('contactName', old('contactName'), ['class' => 'form-control '.($errors->has('contactName') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('contactName'))
            <span class="help-block">
                <strong>{{ $errors->first('contactName') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            {!! Form::label('companyName', __('Nombre de la Empresa')) !!}
            {!! Form::text('companyName', old('companyName'), ['class' => 'form-control '.($errors->has('companyName') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('companyName'))
            <span class="help-block">
                <strong>{{ $errors->first('companyName') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            {!! Form::label('email', __('Correo electrónico')) !!}
            {!! Form::text('email', old('email'), ['class' => 'form-control '.($errors->has('email') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            {!! Form::label('mobile', __('Celular')) !!}
            {!! Form::text('mobile', old('mobile'), ['class' => 'form-control '.($errors->has('mobile') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('mobile'))
            <span class="help-block">
                <strong>{{ $errors->first('mobile') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            {!! Form::label('telephone', __('Teléfono')) !!}
            {!! Form::text('telephone', old('telephone'), ['class' => 'form-control '.($errors->has('telephone') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('telephone'))
            <span class="help-block">
                <strong>{{ $errors->first('telephone') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            {!! Form::label('web', __('Página web (URL)')) !!}
            {!! Form::text('web', old('web'), ['class' => 'form-control '.($errors->has('web') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('web'))
            <span class="help-block">
                <strong>{{ $errors->first('web') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        {!! Form::label('logo', __('Logotipo')) !!} <small><em>Tamaño recomendado 150 x 24 px</em></small>
        {!! Form::file('logo', ['class' => 'form-control '.($errors->has('logo') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('logo'))
        <span class="help-block">
            <strong>{{ $errors->first('logo') }}</strong>
        </span>
        @endif
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        {!! Form::label('description', __('Descripción del proveedor')) !!}
        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
    <div class="col-xs-12 col-sm-12">
            {!! Form::label('observations', __('Observaciones adicionales')) !!}
            {!! Form::textarea('observations', old('observations'), ['class' => 'form-control', 'rows' => 3]) !!}
        </div>
</div>
    
