@extends('main')
@section('title', '| Certificados de Control Calidad')
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Peritajes de Vehículos Usados</h1>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-2 index-button">
		<a href="{{ route('edocs.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Crear peritaje</a>
	</div>
	<div class="col-xs-12 col-sm-9 col-md-10">
		{!! Form::open(array('method' => 'GET' , 'url' => 'app/edocs' ,'class' => 'navbar-form navbar-right search-group' , 'role' => 'search')) !!}
	        <div class="form-group search-items">
	         	<input type="text" name="search" class="form-control input-lg" placeholder="Buscar">
	         	<button type="submit" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
	        </div>    	
      	{!! Form::close() !!}
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
				<th class="text-center">Cliente</th>
				<th class="text-center">Placa</th>
				<th class="text-center">Kilometraje</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Opciones</th>
			</thead>
			<tbody>
				@foreach($edocs as $edoc)
				<tr>
					<td class="text-center">{{$edoc->id}}</td>
					<td class="text-center">{{$edoc->c_firstname}} {{$edoc->c_lastname}}</td>
					<td class="text-center">{{$edoc->license}}</td>
					<td class="text-center">{{number_format($edoc->mileage,0,",",".")}} kms</td>
					<td class="text-center">{{date('d/m/Y', strtotime($edoc->created_at))}}</td>
					<td class="text-center"><div class="button-group btn-group-xs" role="group"><a href="{{route('edocs.show', $edoc->id)}}" class="btn btn-info">Ver</a> <a href="{{route('edocs.edit', $edoc->id)}}" class="btn btn-warning">Editar</a> <a href="{{url('app/edocs/'.$edoc->id.'/pdf')}}" class="btn btn-success">Imprimir</a> <a href="{{url('app/edocs/'.$edoc->id.'/mail')}}" class="btn btn-primary" onclick="mailMessage('{{$edoc->email}}');">Enviar</a> @if (Auth::user()->hasRole('Admin'))<a href="{{url('app/edocs/'.$edoc->id.'/cancel')}}" class="btn btn-danger" onclick="cancelMessage('{{$edoc->id}}');">Anular</a></div></td>@endif
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $edocs->links(); !!}
		</div>
	</div>
</div>	
@endsection
@section('scripts')
<script type="text/javascript">
	function mailMessage(email){
		msg = confirm('Desea enviar el documento al correo'+ ' ' + email + '?');
		if(!msg){
			event.preventDefault();
			window.location.href;
		}
	}
</script>
<script type="text/javascript">
	function cancelMessage(doc){
		msg = confirm('Desea anular el peritaje No.'+' '+ doc + '?');
		if(!msg){
			event.preventDefault();
			window.location.href;
		}
	}
</script>
@endsection