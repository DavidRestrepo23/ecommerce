@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="form-group">
            {!! Form::label('country', __('Pais')) !!}
           @if($supplier != null)
            <select-countries supplier="{{ $supplier->country }}"></select-countries>
           @else
            <select-countries></select-countries>
           @endif
           @if ($errors->has('country'))
            <span class="help-block">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12">
        <div class="form-group">
            {!! Form::label('city', __('Ciudad')) !!}
            {!! Form::text('city', old('city'), ['class' => 'form-control '.($errors->has('city') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="form-group">
                {!! Form::label('neighborhood', __('Barrio')) !!}
                {!! Form::text('neighborhood', old('neighborhood'), ['class' => 'form-control '.($errors->has('neighborhood') ? ' is-invalid' : '' )]) !!}
                @if ($errors->has('neighborhood'))
                <span class="help-block">
                    <strong>{{ $errors->first('neighborhood') }}</strong>
                </span>
                @endif
        </div>
        <div class="form-group">
            {!! Form::label('municipaly', __('Municipio')) !!}
            {!! Form::text('municipaly', old('municipaly'), ['class' => 'form-control '.($errors->has('municipaly') ? ' is-invalid' : '' )]) !!}
            @if ($errors->has('municipaly'))
            <span class="help-block">
                <strong>{{ $errors->first('municipaly') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12">
        {!! Form::label('address', __('Dirección')) !!}
        {!! Form::textarea('address', old('address'), ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
</div>
<br><br>

    
