@extends('main')
@section('title', '| Ordenes de Reparación Taller')
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Ordenes de Reparación Taller</h1>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-2 index-button">
		<a href="{{ route('otdocs.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">Crear Orden</a>
	</div>
	<div class="col-xs-12 col-sm-9 col-md-10 search-button">
		{!! Form::open(array('method' => 'GET' , 'url' => 'app/otdocs' ,'class' => 'navbar-form navbar-right search-group' , 'role' => 'search')) !!}
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
				<th class="text-center">OR</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Opciones</th>
			</thead>
			<tbody>
				@foreach($otdocs as $otdoc)
				<tr>
					<td class="text-center">{{$otdoc->id_number}}</td>
					<td class="text-center">{{$otdoc->c_firstname}} {{$otdoc->c_lastname}}</td>
					<td class="text-center">{{$otdoc->license}}</td>
					<td class="text-center">{{number_format($otdoc->mileage,0,",",".")}} kms</td>
					<td class="text-center">{{$otdoc->ordernumber}}</td>
					<td class="text-center">{{date('d/m/Y', strtotime($otdoc->created_at))}}</td>
					<td class="text-center"><div class="button-group btn-group-xs" role="group"><a href="{{route('otdocs.show', $otdoc->id)}}" class="btn btn-info">Ver</a> <a href="{{route('otdocs.edit', $otdoc->id)}}" class="btn btn-warning">Editar</a> <a href="{{url('app/otdocs/'.$otdoc->id.'/photo/')}}" class="btn btn-success">Fotos</a> <a href="{{url('app/otdocs/'.$otdoc->id.'/dtc/')}}" class="btn btn-primary">DTC</a> @if (Auth::check()) @if (Auth::user()->hasRole('Admin'))<a href="{{url('app/otdocs/'.$otdoc->id.'/cancel')}}" class="btn btn-default" onclick="cancelMessage('{{$otdoc->ordernumber}}');">Anular</a>
						{!! Form::open(array('route' => ['otdocs.destroy', $otdoc->id], 'method' => 'DELETE')) !!}
							{{Form::submit('Eliminar', array('class' => 'btn btn-danger btn-block'))}}
						{!! Form::close() !!}
						@endif
					@endif
					</div>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $otdocs->links(); !!}
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	function cancelMessage(doc){
		msg = confirm('Desea anular la orden de reparación No.'+' '+ doc + '?');
		if(!msg){
			event.preventDefault();
			window.location.href;
		}
	}
</script>
@endsection