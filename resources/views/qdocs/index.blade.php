@extends('main')
@section('title', '| Certificados de Control Calidad')
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-9 col-md-10 index-header">
		<h1>Certificados de Control Calidad</h1>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-2 index-button">
		<a href="{{ route('create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Crear certificado</a>
	</div>
	<div class="col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-12 table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center">No.</th>
				<th class="text-center">Cliente</th>
				<th class="text-center">Placa</th>
				<th class="text-center">Kilometraje</th>
				<th class="text-center">OR</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Opciones</th>
			</thead>
			<tbody>
				@foreach($qdocs as $qdoc)
				<tr>
					<td class="text-center">{{$qdoc->id}}</td>
					<td class="text-center">{{$qdoc->c_firstname}} {{$qdoc->c_lastname}}</td>
					<td class="text-center">{{$qdoc->license}}</td>
					<td class="text-center">{{number_format($qdoc->mileage,0,",",".")}} kms</td>
					<td class="text-center">{{$qdoc->ordernumber}}</td>
					<td class="text-center">{{date('d/m/Y', strtotime($qdoc->created_at))}}</td>
					<td class="text-center"><a href="{{route('qdocs.show', $qdoc->id)}}" class="btn btn-info btn-sm">Ver</a> <a href="{{route('qdocs.edit', $qdoc->id)}}" class="btn btn-danger btn-sm">Editar</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>	
@endsection