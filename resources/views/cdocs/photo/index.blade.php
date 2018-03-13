@extends('main')
@section('title', '| Fotos Cotización de Colisión Exprés No. '.$doc)
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Fotos Cotización de Colisión Exprés No. {{$doc}}</h1>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-2 index-button">
		<a href="{{ route('cdocs.photo.create', $cdocs->id) }}" class="btn btn-lg  btn-primary btn-h1-spacing">Agregar fotos</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-12 table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center">No.</th>
				<th class="text-center">Nombre</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Foto</th>
				<th class="text-center">Opciones</th>
			</thead>
			<tbody>
				@foreach($cphotos as $cphoto)
				<tr>
					<td class="text-center v-center">{{$cphoto->id}}</td>
					<td class="text-center v-center">{{$cphoto->image_name}}</td>
					<td class="text-center v-center">{{$cphoto->created_at}}</td>
					<td class="text-center"><img src="{{$cphoto->image_url}}" alt="{{$cphoto->image_name}}"></td>
					<td class="text-center v-center"><div class="button-group btn-group-xs" role="group"><a href="{{route('cdocs.photo.show', ['cdoc'=>$cdocs->id, 'photo'=>$cphoto->id])}}" class="btn btn-info">Ver</a>
						{!! Form::open(array('route' => ['cdocs.photo.destroy', 'cdoc'=>$cdocs->id, 'photo'=>$cphoto->id], 'method' => 'DELETE')) !!}
							{{Form::submit('Eliminar', array('class' => 'btn btn-danger btn-block'))}}
						{!! Form::close() !!}
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>	
@endsection