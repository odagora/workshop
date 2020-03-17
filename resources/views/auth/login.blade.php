@extends('layouts.main')
@section('title', '| Gestión Documentos e Información Taller')
@section('content')
<div class="container">
    <div class="row">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-8 col-md-8 col-lg-6 offset-2 offset-sm-2 offset-md-3 login-form p-t-60">
            <div class="card">
                <div class="card-header text-center"><img src="{{asset('img/logo.png')}}" class="img-fluid login-logo" alt="Logo Servitalleres"></div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-4 col-md-4 col-form-label control-label">E-Mail</label>

                            <div class="col-sm-8 col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-sm-5 col-md-4 col-form-label control-label">Contraseña</label>

                            <div class="col-sm-7 col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-lg-6 offset-sm-4 offset-md-4">
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-lg-8  offset-sm-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">Ingresar</button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidó su contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
