@extends('main')
@section('title', '| Editar Tipo de Vehículo '.'No. '.$type->id)
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h1 class="text-center">Editar Tipo de Vehículo No. {{$type->id}}</h1>
		<hr>
	</div>
	<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">Edición</div>
			<div class="panel-body">
				{!! Form::model($type, ['route' => ['types.update', $type->id], 'method' => 'PUT', 'class' => 'form-horizontal panel']) !!}
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
						<div class="alert alert-danger" role="alert">{{ $errors->first('make_id') }}</div>
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
@section('scripts')
{{-- Dropdown dependent menu for make | Ajax request to avoid page reload and select old values if validation fails --}}
<script type="text/javascript">
$(function(){
    //Get the id for the make selected
    var make_id = '{{ $make_id->id }}';

    //Make selection
    $('#make_id').val(make_id).prop('selected', true);
});
</script>
@endsection