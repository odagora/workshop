@extends('main')
@section('title', '| Admin Panel Principal')
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Configuración Principal</h1>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<hr>
	</div>

</div>
<div class="row text-center" style="padding-bottom: 250px;">
	<div class="btn-group-lg" role="group">
		<a href="{{route('makes.index')}}" class="btn btn-primary btn-responsive">Administrar Marcas</a> <a href="{{route('types.index')}}" class="btn btn-info">Administrar Líneas</a>
	</div>
</div>
@endsection