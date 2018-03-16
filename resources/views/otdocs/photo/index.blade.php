@extends('main')
@section('title', '| Fotos Orden de Reparación No. '.$doc)
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Fotos Orden de Reparación No. {{$doc}}</h1>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-2 index-button">
		<a href="{{ route('otdocs.photo.create', $otdocs->id) }}" class="btn btn-lg  btn-primary btn-h1-spacing">Agregar fotos</a>
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
				@foreach($otphotos as $otphoto)
				<tr>
					<td class="text-center v-center">{{$otphoto->doc_number}}</td>
					<td class="text-center v-center">{{$otphoto->image_name}}</td>
					<td class="text-center v-center">{{$otphoto->created_at}}</td>
					<td class="text-center"><img src="{{$otphoto->image_url}}" alt="{{$otphoto->image_name}}"></td>
					<td class="text-center v-center"><div class="button-group btn-group-xs" role="group"><a href="{{route('otdocs.photo.show', ['otdoc'=>$otdocs->id, 'photo'=>$otphoto->id])}}" class="btn btn-info">Ver</a>
						{!! Form::open(array('route' => ['otdocs.photo.destroy', 'otdoc'=>$otdocs->id, 'photo'=>$otphoto->id], 'method' => 'DELETE')) !!}
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