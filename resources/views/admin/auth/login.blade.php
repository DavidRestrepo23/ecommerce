@extends('layouts.login')

@section('content')

<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">{{__('Inicio de sesión')}}</p>

      <form method="POST" action="{{ route('adminLogin') }}">
        @csrf
        <div class="form-group has-feedback">
            <div class="row">
                <div class="col-1">
                    <span style="font-size:15pt" class="fa fa-envelope form-control-feedback"></span>
                </div>
                <div class="col-11">
                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Correo electrónico">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group has-feedback">
          <div class="row">
            <div class="col-1">
                <span style="font-size:15pt" class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="col-11">
                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña">                
                @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{__('Recordarme')}}
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 center-block">
              <hr>
            <button type="submit" class="btn btn-dark btn-block btn-flat">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br><br>
      <p class="mb-1">
        <a href="{{ route('password.request') }}">Olvide mi contraseña</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
@endsection
