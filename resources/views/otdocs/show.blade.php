@extends('main')
@section('title', '| Orden de Reparación Taller No. '.$doc)
@section('content')
<div class="row">
	<h2 class="text-center text-uppercase">Orden de Reparación Taller # {{$doc}} @if($otdoc->status == 'cancelled')<span class="text-danger">- ANULADO -</span>@endif</h2>
	<hr>
</div>
<div class="row well">
	<div class="header-info col-xs-12 col-sm-6 col-md-4 col-md-offset-2">
		<div class="col-xs-6 col-sm-6 col-md-4">
			<p><strong>Fecha:</strong></p>
			<p><strong>Orden:</strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ date('d/m/Y', strtotime($otdoc->created_at)) }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $otdoc->ordernumber }}</p>
		</div>
	</div>
	<div class="header-info col-xs-12 col-sm-6 col-md-4">
		<div class="col-xs-6 col-sm-5 col-md-4">
			<p><strong>Cliente: </strong></p>
			<p><strong>Placa: </strong></p>
			<p><strong>Kilometraje: </strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $otdoc->c_firstname }} {{ $otdoc->c_lastname }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $otdoc->license }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ number_format($otdoc->mileage,0,",",".") }}</p>
		</div>
	</div>
</div>
<div class="row well">
	<h4 class="text-center text-uppercase"><strong>Fotos de ingreso del vehículo</strong></h4>
</div>
<div class="row well">
	@foreach($otphotos as $otphoto)
		<div class="col-xs-12 col-sm-6 col-md-4">
           <a href="{{str_replace('c_fit,h_200,w_200', 'c_fit,h_800,w_800' , $otphoto->image_url)}}" target="_blank">
               <img src="{{$otphoto->image_url}}" class="img-responsive center-block or-image" alt="{{$otphoto->image_name}}">
           </a>
       </div>
	@endforeach
</div>
<div class="row well">
	<h4 class="text-center text-uppercase"><strong>Códigos de fallo del vehículo</strong></h4>
</div>
<div class="row well">
	@foreach($otdtcs as $otdtc)
		<div class="col-xs-12 col-sm-6 col-md-4">
           <a href="{{str_replace('c_fit,h_200,w_200', 'c_fit,h_800,w_800' , $otdtc->image_url)}}" target="_blank">
               <img src="{{$otdtc->image_url}}" class="img-responsive center-block or-image" alt="{{$otdtc->image_name}}">
           </a>
       </div>
	@endforeach
</div>
@endsection