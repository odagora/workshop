@extends('base')
@section('title', '| Cotización de Colisión Exprés '.'No. '.$doc)
@section('content')
<div class="row">
	@if($cdoc->status == 'ok')
		<div class="col-xs-6 col-sm-6 col-md-6 text-left">
			<img src="{{asset('img/logo-250x30.png')}}" class="img-responsive" alt="logo servitalleres">
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 doc-number">
			<div class="col-xs-7 col-sm-7 col-md-7 text-right">
				<p><strong>Cotización</strong></p>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 text-center text-danger panel panel-default">
				<p><strong>No. {{ $doc }}</strong></p>
			</div>
		</div>
	@else
		<div class="col-xs-5 col-sm-5 col-md-5 text-left">
			<img src="{{asset('img/logo.png')}}" class="img-responsive" alt="logo servitalleres">
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 doc-number">
			<div class="col-xs-4 col-sm-4 col-md-4 text-left">
				<p><strong>Cotización:</strong></p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 text-center text-danger">
				<p><strong>No. {{ $doc }}</strong></p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 text-center text-danger">
				<p><strong>ANULADA</strong></p>
			</div>
		</div>
	@endif
</div>
<div class="row">
	<h3 class="text-center text-uppercase" style="margin: 5px 0;"><strong>Servicio de latonería y pintura exprés</strong></h3>
</div>
<div class="row well quote">
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<div class="col-xs-2 col-sm-2 col-md-2 col-xs-offset-1 quote-title">
			<h6><strong>Fecha:</strong></h6>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 panel panel-default">
			<h6>{{ date('d/m/Y', strtotime($cdoc->created_at)) }}</h6>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 quote-title">
			<h6><strong>Asesor de servicio:</strong></h6>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 panel panel-default" style="padding: 0;">
			<h6>{{ $cdoc->e_firstname }} {{ $cdoc->e_lastname }}</h6>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<div class="col-xs-1 col-sm-2 col-md-2 quote-title">
			<h6><strong>Nombre:</strong></h6>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 panel panel-default" style="padding: 0; width:31%;">
			<h6>{{ $cdoc->c_firstname }} {{ $cdoc->c_lastname }}</h6>
		</div>
		<div class="col-xs-1 col-sm-2 col-md-2 quote-title">
			<h6><strong>Teléfono:</strong></h6>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 panel panel-default" style="padding: 0; width: 10.6666667%">
			<h6>{{ $cdoc->phone }}</h6>
		</div>
		<div class="col-xs-1 col-sm-2 col-md-2 quote-title">
			<h6><strong>Correo:</strong></h6>
		</div>
		<div class="col-xs-4 col-sm-3 col-md-3 quote-item panel panel-default" style="padding: 0;">
			<h6>{{ $cdoc->email }}</h6>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<div class="col-xs-1 col-sm-2 col-md-2 quote-title">
			<h6><strong>Vehículo:</strong></h6>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 panel panel-default">
			<h6>{{ $make->name }} {{ $type->name }}</h6>
		</div>
		<div class="col-xs-1 col-sm-2 col-md-2 quote-title">
			<h6><strong>Placa:</strong></h6>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-sp-1 panel panel-default">
			<h6>{{ $cdoc->license }}</h6>
		</div>
		<div class="col-xs-1 col-sm-2 col-md-2 quote-title">
			<h6><strong>Modelo:</strong></h6>
		</div>
		<div class="col-xs-2 col-sm-3 col-md-3 col-sp-1 panel panel-default">
			<h6>{{ $cdoc->model }}</h6>
		</div>
		<div class="col-xs-1 col-sm-2 col-md-2 col-sp-1 quote-title">
			<h6><strong>Kilometraje:</strong></h6>
		</div>
		<div class="col-xs-1 col-sm-3 col-md-3 col-sp-2 quote-item panel panel-default">
			<h6>{{ number_format($cdoc->mileage,0,",",".") }} kms</h6>
		</div>
	</div>	
</div>
<div class="row well quote">
	<div class="col-xs-12 col-sm-12 col-md-12 text-left quote-description">
		<div class="col-xs-3 col-sm-3 col-md-2 quote-title">
			<h6><strong>Trabajos a realizar:</strong></h6>
		</div>
		<div class="col-xs-9 col-sm-9 col-md-10 quote-title quote-works panel panel-default">
			<h6>{{ $cdoc->description }}</h6>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 text-left">
		<div class="col-xs-3 col-sm-2 col-md-2 quote-title">
			<h6><strong>Repuestos asociados:</strong></h6>
		</div>
		<div class="col-xs-9 col-sm-2 col-md-2 quote-spare">
			@php
			$elem1 = ($cdoc->spare_parts == 'yes' ? ' checked' : '');
			$elem2 = ($cdoc->spare_parts == 'no' ? ' checked' : ''); 
			@endphp
			<div class="col-xs-2 col-sm-2 col-md-2 radio-options panel panel-default">
				{{Form::radio('spare_parts', 'yes', $elem1, ['id' => 'yes'])}}<span>Si</span>
			    {{Form::radio('spare_parts', 'no' , $elem2, ['id' => 'no'])}}<span>No</span>
			</div>
		</div>
	</div>
	@if($cdoc->spare_parts == 'yes')
		<div class="col-xs-12 col-sm-12 col-md-12 text-left quote-spare-title">
			<div class="col-xs-3 col-sm-2 col-md-2 quote-title">
				<h6><strong>Repuestos:</strong></h6>
			</div>
			<div class="col-xs-9 col-sm-10 col-md-10 quote-title quote-spare-desc panel panel-default">
				<h6>{{ $cdoc->spare_description }}</h6>
			</div>
		</div>
	@endif	
</div>
<div class="row well quote">
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<div class="col-xs-3 col-sm-2 col-md-2 col-xs-offset-7 quote-title">
			<h5><strong>Tu reparación cuesta:</strong></h5>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 quote-title panel panel-default">
			<h5><strong>${{ number_format($cdoc->price,0,",",".") }} *</strong></h5>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<div class="col-xs-3 col-sm-2 col-md-2 col-xs-offset-7 quote-title">
			<h5><strong>Tiempo de entrega:</strong></h5>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 quote-title panel panel-default">
			<h5><strong>{{ $cdoc->time }} horas</strong></h5>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<div class="col-xs-4 col-sm-2 col-md-2 col-xs-offset-5 quote-title text-right">
			<h6><strong>Validez de la cotización:</strong></h6>
		</div>
		<div class="col-xs-3 col-sm-2 col-md-2 quote-validity">
			<div class="col-xs-5 quote-days panel panel-default">
				<h6>{{$cdoc->validity_time}} días</h6>
			</div>
			<div class="col-xs-7 quote-tax">
				<h6>* IVA incluido</h6>
			</div> 
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 text-center quote-footer">
		<h6>Carrera 22 # 76-57 | Bogotá - Colombia | 2117943 - 2119290<br>contacto@servitalleres.com | www.servitalleres.com</h6>
	</div>
</div>
@endsection