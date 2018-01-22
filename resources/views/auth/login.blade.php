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
        <div class="col-xs-8 col-sm-8 col-md-6 col-xs-offset-2 col-sm-offset-2 col-md-offset-3 login-form" style="padding-top: 60px;">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><img src="{{asset('img/logo.png')}}" class="img-responsive login-logo" alt="Logo Servitalleres"></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-4 col-md-4 control-label">E-Mail</label>

                            <div class="col-sm-6 col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-xs-3 col-sm-4 col-md-4 control-label">Contraseña</label>

                            <div class="col-sm-6 col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-md-6 col-sm-offset-4 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-md-8  col-sm-offset-4 col-md-offset-4">
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
