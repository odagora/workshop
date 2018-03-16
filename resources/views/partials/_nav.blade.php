<nav class="navbar navbar-default">
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
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li class="{{Request::is('app/home') ? "active" :""}}"><a href="{{ url('/app/home') }}">Inicio</a></li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Secciones<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="{{ url('/app/qdocs') }}">Control Calidad</a></li>
    <li><a href="{{ url('/app/edocs') }}">Peritajes</a></li>
    <li><a href="{{ url('/app/idocs') }}">Inspecciones Visuales</a></li>
    <li><a href="{{ url('/app/cdocs') }}">Cotizaciones Colisión</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="{{ url('/app/otdocs') }}">Fotos OR</a></li>
    <li><a href="{{ url('/app/prices') }}">Precios MO</a></li>
  </ul>
</li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@if (Auth::check()){{ Auth::user()->name }}@endif <span class="caret"></span></a>
  <ul class="dropdown-menu">
    @if (Auth::check())
      @if (Auth::user()->hasRole('Admin'))
        <li><a href="{{ route('register') }}">Registro de usuario</a></li>
        <li><a href="{{ route('users.index') }}">Administrar usuarios</a></li>
        <li><a href="{{ route('admin') }}">Configuración</a></li>
        <li role="separator" class="divider"></li>
      @endif
    @endif
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">Salir</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>
</li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>