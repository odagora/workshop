@extends('main')
@section('title', '| Inspecciones Visuales de Mecánica y Colisión')
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Inspecciones Visuales de Mecánica y Colisión</h1>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-2 index-button">
		<a href="{{ route('idocs.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">Crear inspección</a>
	</div>
	<div class="col-xs-12 col-sm-9 col-md-10 search-button">
		{!! Form::open(array('method' => 'GET' , 'url' => 'app/idocs' ,'class' => 'navbar-form navbar-right search-group' , 'role' => 'search')) !!}
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
				@foreach($idocs as $idoc)
				<tr>
					<td class="text-center">{{$idoc->doc_number + 3012}}</td>
					<td class="text-center">{{$idoc->c_firstname}} {{$idoc->c_lastname}}</td>
					<td class="text-center">{{$idoc->license}}</td>
					<td class="text-center">{{number_format($idoc->mileage,0,",",".")}} kms</td>
					<td class="text-center">{{date('d/m/Y', strtotime($idoc->created_at))}}</td>
					<td class="text-center"><div class="button-group btn-group-xs" role="group"><a href="{{route('idocs.show', $idoc->id)}}" class="btn btn-info">Ver</a> <a href="{{route('idocs.edit', $idoc->id)}}" class="btn btn-warning">Editar</a> <a href="{{url('app/idocs/'.$idoc->id.'/pdf')}}" class="btn btn-success">Imprimir</a> <a href="{{url('app/idocs/'.$idoc->id.'/mail')}}" class="btn btn-primary" onclick="mailMessage('{{$idoc->email}}');">Enviar</a> @if (Auth::check()) @if (Auth::user()->hasRole('Admin'))<a href="{{url('app/idocs/'.$idoc->id.'/cancel')}}" class="btn btn-danger" onclick="cancelMessage('{{$idoc->doc_number + 3012}}');">Anular</a></div></td>@endif @endif
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $idocs->links(); !!}
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
		msg = confirm('Desea anular el informe de inspcción No.'+' '+ doc + '?');
		if(!msg){
			event.preventDefault();
			window.location.href;
		}
	}
</script>
@endsection