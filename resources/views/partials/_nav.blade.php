{{-- <nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('img/logo-172x22.png')}}" alt="Logo Servitalleres"></a>
</div> --}}

<nav class="navbar navbar-light bg-light navbar-expand-lg m-b-20">
  <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('img/logo-172x22.png')}}" alt="Logo Servitalleres"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{Request::is('app/home') ? "active" :""}}">
        <a class="nav-link" href="{{ url('/app/home') }}">Inicio</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Secciones
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/app/qdocs') }}">Control Calidad</a>
          <a class="dropdown-item" href="{{ url('/app/edocs') }}">Peritajes</a>
          <a class="dropdown-item" href="{{ url('/app/idocs') }}">Inspecciones Visuales</a>
          <a class="dropdown-item" href="{{ url('/app/cdocs') }}">Cotizaciones Colisión</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ url('/app/otdocs') }}">Fotos OR</a>
          <a class="dropdown-item" href="{{ url('/app/prices') }}">Precios MO</a>
        </div>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@if (Auth::check()){{ Auth::user()->name }}@endif <span class="caret"></span></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          @if (Auth::check())
            @if (Auth::user()->hasRole('Admin'))
              <a class="dropdown-item" href="{{ route('register') }}">Registro de usuario</a>
              <a class="dropdown-item" href="{{ route('users.index') }}">Administrar usuarios</a>
              <a class="dropdown-item" href="{{ route('admin') }}">Configuración</a>
              <div class="dropdown-divider"></div>
            @endif
          @endif
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Salir</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
        </div>
      </li>
    </ul><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>