@extends('base')
@section('title', '| Application Login')
@section('content')
    <form class="form-signin">
        <img src="{{asset('img/logo.png')}}" alt="Logo Servitalleres">
        <div class="input-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <span class="input-group-addon logininput glyphicon glyphicon-user" aria-hidden="true"></span><input type="email" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>   
        </div>
        <br>
        <div class="input-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <span class="input-group-addon logininput glyphicon glyphicon-lock" aria-hidden="true"></span><input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Recordarme
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
        <div class="forgot-password-link" style="cursor: pointer; display:;">
            <a href="javascript:void(0)">Ha olvidado su contraseña?</a>
        </div>
    </form>
@endsection