@extends('main')
@section('title', '| Certificado de control calidad')
@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')
<div class="row">
	<h2 class="text-center text-uppercase">Certificado de Control Calidad</h2>
	<hr>
</div>
<div class="row well">
	<div class="header-info col-xs-12 col-sm-3 col-md-4">
		<div class="col-xs-6 col-sm-6 col-md-4">
			<p><strong>Fecha:</strong></p>
			<p><strong>Orden:</strong></p>
			<p><strong>Asesor:</strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ date('d/m/Y', strtotime($qdoc->created_at)) }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->ordernumber }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->e_firstname }} {{ $qdoc->e_lastname }}</p>
		</div>
	</div>
	<div class="header-info col-xs-12 col-sm-5 col-md-4">
		<div class="col-xs-6 col-sm-5 col-md-4">
			<p><strong>Cliente: </strong></p>
			<p><strong>Teléfono: </strong></p>
			<p><strong>Email: </strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->c_firstname }} {{ $qdoc->c_lastname }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">3186515096</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->email }}</p>
		</div>
	</div>
	<div class="header-info col-xs-12 col-sm-4 col-md-4">
		<div class="col-xs-6 col-sm-6 col-md-5">
			<p><strong>Vehículo: </strong></p>
			<p><strong>Modelo: </strong></p>
			<p><strong>Placa: </strong></p>
			<p><strong>Kilometraje: </strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-7">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $make->name }} {{ $type->name }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->model }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->license }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ number_format($qdoc->mileage,0,",",".") }}</p>
		</div>
	</div>
</div>
@endsection