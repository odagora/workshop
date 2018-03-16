@extends('main')
@section('title', '| Editar Orden de Reparación No. '.$doc) 
@section('content')
<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2">
		<h1 class="text-center">Editar Orden de Reparación No. {{$otdoc->ordernumber}}</h1>
		<hr>
		{!! Form::model($otdoc, ['name' => 'otdoc_form' , 'id' => 'otdoc_form' , 'method' => 'PUT', 'route' => ['otdocs.update', $otdoc->id]]) !!}
			<div class="form-group">
				<div class="row">
					<div class="col-xs-4 col-sm-3 col-md-3 date">
						{{ Form::label('created_at', 'Fecha:')}}
						{{ Form::date('created_at', \Carbon\Carbon::now(), array('class' =>'form-control'))}}
					</div>
				</div>
			</div>
			<div class="form-group">
	    		{{ Form::label('c_name', 'Cliente:')}}
		    	<div class="form-inline">
		    		<div class="col-xs-5 col-sm-3 col-md-3 pull-left names">
		    			{{ Form::text('c_firstname', null, array('class' => 'form-control'))}}
		    			<br class="break">
		    			{{ Form::label('c_firstname', 'Nombre(s)')}}
		    		</div>
		    		<div class="col-xs-5 col-sm-3 col-md-3 pull-left names">
		    			{{ Form::text('c_lastname', null, array('class' => 'form-control'))}}
		    			<br class="break">
		    			{{ Form::label('c_lastname', 'Apellido')}}
					</div>
				</div>
			</div>
			@if ($errors->has('c_firstname'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('c_firstname') }}</div>
			@endif
			@if ($errors->has('c_lastname'))
				<div class="alert alert-danger" role="alert">{{ $errors->first('c_lastname') }}</div>
			@endif
			<div class="form-group">
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
			    		{{ Form::label('license', 'Placa:')}}
			    		{{ Form::text('license', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
	    	</div>
	    	@if ($errors->has('license'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('license') }}</div>
			@endif
	    	<div class="form-group">
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
			    		{{ Form::label('mileage', 'Kilometraje:')}}
			    		{{ Form::number('mileage', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
	    	</div>
	    	@if ($errors->has('mileage'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('mileage') }}</div>
			@endif
			<div class="form-group">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						{{ Form::label('ordernumber', 'Orden de reparación:')}}
					</div>
					<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
			    		{{ Form::number('ordernumber', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
	    	</div>
	    	@if ($errors->has('ordernumber'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('ordernumber') }}</div>
			@endif
			{{Form::submit('Guardar', array('class' => 'btn btn-success', 'style' => 'margin-top: 30px;'))}}
		{!! Form::close() !!}
	</div>
</div>
{{-- Scroll to top button --}}
<a class="scrollToTop" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up fa-4x" aria-hidden="true"></i></a>
@endsection