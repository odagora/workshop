@extends('main')
@section('title', '| Imágenes DTC Orden de Reparación No. '.$doc)
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Imágenes DTC Orden de Reparación No. {{$doc}}</h1>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<img class="img-responsive" src="{{str_replace('c_fit,h_200,w_200', 'c_fit,h_800,w_800' , $otdtc->image_url)}}" alt="{{$otdtc->image_name}}" style="margin: auto">
		<h3>Foto No. {{$otdtc->doc_number}} con nombre: {{$otdtc->image_name}}</h3>
	</div>
</div>
@endsection