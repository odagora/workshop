@extends('main')
@section('title', '| Editar Marca de Vehículo '.'No. '.$make->id)
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h1 class="text-center">Editar Marca de Vehículo No. {{$make->id}}</h1>
		<hr>
	</div>
	<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">Edición</div>
			<div class="panel-body">
				{!! Form::model($make, ['route' => ['makes.update', $make->id], 'method' => 'PUT', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group">
						{{ Form::label('name', 'Marca:', ['class' => 'col-md-4 control-label'])}}
						<div class="col-md-6">
							{{ Form::text('name', null, array('class' => 'form-control'))}}
						</div>
					</div>
					@if ($errors->has('name'))
					<br>
					<div class="alert alert-danger" role="alert">	{{ $errors->first('name') }}
					</div>
				@endif
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							{{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection