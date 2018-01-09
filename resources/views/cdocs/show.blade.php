@extends('main')
@section('title', '| Cotización de Colisión Exprés '.'No. '.$cdoc->id)
@section('content')
<div class="row">
	<h2 class="text-center text-uppercase">Cotización de Colisión Exprés # {{$cdoc->id}} @if($cdoc->status == 'cancelled')<span class="text-danger">- ANULADA -</span>@endif</h2>
	<hr>
</div>
<div class="row well">
	<div class="header-info col-xs-12 col-sm-3 col-md-4">
		<div class="col-xs-6 col-sm-6 col-md-4">
			<p><strong>Fecha:</strong></p>
			<p><strong>Asesor:</strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ date('d/m/Y', strtotime($cdoc->created_at)) }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->e_firstname }} {{ $cdoc->e_lastname }}</p>
		</div>
	</div>
	<div class="header-info col-xs-12 col-sm-5 col-md-4">
		<div class="col-xs-6 col-sm-5 col-md-4">
			<p><strong>Cliente: </strong></p>
			<p><strong>Teléfono: </strong></p>
			<p><strong>Email: </strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->c_firstname }} {{ $cdoc->c_lastname }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{$cdoc->phone}}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->email }}</p>
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
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->model }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->license }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ number_format($cdoc->mileage,0,",",".") }}</p>
		</div>
	</div>
</div>
<div class="row well">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center"><strong>Trabajos a realizar:</strong></h4>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->description }}</h4>
		</div>
	</div>
</div>
<div class="row well">
	<div class="col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center"><strong>Repuestos asociados:</strong></h4>
	</div>
	<div class="col-xs-8 col-sm-8 col-md-8 spare-options">
		@php
		$elem1 = ($cdoc->spare_parts == 'yes' ? ' checked' : '');
		$elem2 = ($cdoc->spare_parts == 'no' ? ' checked' : ''); 
		@endphp
		<div class="col-xs-12 col-sm-12 col-md-12 option show-option">
			{{Form::radio('spare_parts', 'yes', $elem1, ['id' => 'yes', 'onclick' => 'showField()'])}}<span>Si</span>
		    {{Form::radio('spare_parts', 'no' , $elem2, ['id' => 'no', 'onclick' => 'showField()'])}}<span>No</span>
		</div>
	</div>
</div>
<div class="row well" id="spare_description">
	<div class="col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center"><strong>Repuestos:</strong></h4>
	</div>
	<div class="col-xs-8 col-sm-8 col-md-8 option show-option">
			<h4 class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->spare_description }}</h4>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-6 well">
		<div class="col-xs-4 col-sm-4 col-md-6">
			<h4 class="text-center"><strong>Tu reparación cuesta:</strong></h4>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-6 price">
			<h4 class="text-center" style="border-bottom: 1px solid #eee;">${{ number_format($cdoc->price,0,",",".") }} (IVA incluido)</h4>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-6 well">
		<div class="col-xs-4 col-sm-4 col-md-6">
			<h4 class="text-center"><strong>Tiempo de entrega:</strong></h4>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-6 price">
			<h4 class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->time }} horas</h4>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-6 well">
		<div class="col-xs-4 col-sm-4 col-md-6">
			<h4 class="text-center"><strong>Validez de la cotización:</strong></h4>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-6 price">
			<h4 class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->validity_time }} días</h4>
		</div>
	</div>
</div>
<div class="row well">
	<div class="col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center text-danger"><strong>Observaciones (USO INTERNO):</strong></h4>
	</div>
	<div class="col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-center" style="border-bottom: 1px solid #eee;">{{ $cdoc->observations }}</h4>
	</div>
</div>
<div class="row">
	<div class="row">
		<div class="col-md-4 text-center">
			<div class="col-md-6">
				{!! Html::linkRoute('cdocs.edit', 'Editar', array($cdoc->id), array('class' => 'btn btn-warning btn-block')) !!}
			</div>
			@if (Auth::user()->hasRole('Admin'))
				<div class="col-md-6">
					{!! Form::open(array('route' => ['cdocs.destroy', $cdoc->id], 'method' => 'DELETE')) !!}
						{{Form::submit('Eliminar', array('class' => 'btn btn-danger btn-block'))}}
					{!! Form::close() !!}	
				</div>
			@endif
		</div>
	</div>
</div>
{{-- Scroll to top button --}}
<a class="scrollToTop" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up fa-4x" aria-hidden="true"></i></a>
@endsection
@section('scripts')
<script type="text/javascript">
    window.onload = function (){
        if(document.getElementById("yes").checked){
            document.getElementById("spare_description").style.display= 'block';
        }
        else{
            document.getElementById("spare_description").style.display= 'none';
        }
    }
</script>
@endsection