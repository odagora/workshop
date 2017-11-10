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
<a class="navbar-brand" href="#">Servitalleres</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li class="{{Request::is('index') ? "active" :""}}"><a href="/index">Inicio</a></li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Secciones<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="qdocs">Control Calidad</a></li>
    <li><a href="edocs">Peritajes</a></li>
    <li><a href="idocs">Inspecciones Visuales</a></li>
    <li><a href="cdocs">Cotizaciones Colisión</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="photo">Fotos OR</a></li>
    <li><a href="price">Precios MO</a></li>
  </ul>
</li>
</ul>
<form class="navbar-form navbar-left">
<div class="form-group">
  <input type="text" class="form-control" placeholder="Buscar">
</div>
<button type="submit" class="btn btn-default" aria-label="Search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</form>
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#">Perfil</a></li>
    <li><a href="#">Configuración</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Salir</a></li>
  </ul>
</li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>