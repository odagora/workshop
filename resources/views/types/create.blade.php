@extends('main')
@section('title', '| Crear Nuevo Tipo de Vehículo')
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h1 class="text-center">Crear Nuevo Tipo de Vehículo</h1>
		<hr>
	</div>
	<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">Creación</div>
			<div class="panel-body">
				{!! Form::open(['name' =>'type_form', 'id' =>'type_form', 'route' => 'types.store', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group">
						{{ Form::label('name', 'Tipo:', ['class' => 'col-md-4 control-label'])}}
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
						{{ Form::label('make_id', 'Marca:', ['class' => 'col-md-4 control-label'])}}
						<div class="col-md-6">
							<select name="make_id" id="make_id" class="form-control">
	                    		@foreach ($makes as $make)
	                        		<option value="{{ $make->id }}">{{ $make->name }}</option>
	                   			@endforeach
	                		</select>
						</div>
					</div>
					@if ($errors->has('make_id'))
					<br>
					<div class="alert alert-danger" role="alert">	{{ $errors->first('make_id') }}
					</div>
					@endif
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							{{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection