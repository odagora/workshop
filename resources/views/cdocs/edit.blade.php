@extends('main')
@section('title', '| Editar Cotización de Colisión Exprés'.'No. '.$doc) 
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center">Editar Cotización de Colisión Exprés # {{$doc}}</h1>
		<hr>
		{!! Form::model($cdoc, ['route' => ['cdocs.update', $cdoc->id], 'method' => 'PUT']) !!}
			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{{ Form::label('created_at', 'Fecha:')}}
						{{ Form::date('created_at', \Carbon\Carbon::now(), array('class' =>'form-control'))}}
					</div>
				</div>
			</div>
	    	<div class="form-group">
	    		{{ Form::label('e_name', 'Asesor de servicio:')}}
		    	<div class="form-inline">
		    		<div class="pull-left">
		    			{{ Form::text('e_firstname', null, array('class' => 'form-control'))}}
		    			<br>
		    			{{ Form::label('e_firstname', 'Nombre')}}
		    		</div>
		    		<div>
		    			{{ Form::text('e_lastname', null, array('class' => 'form-control'))}}
		    			<br>
		    			{{ Form::label('e_lastname', 'Apellido')}}
					</div>
				</div>
			</div>
			@if ($errors->has('e_firstname'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('e_firstname') }}</div>
			@endif
			@if ($errors->has('e_lastname'))
				<div class="alert alert-danger" role="alert">{{ $errors->first('e_lastname') }}</div>
			@endif
			<hr>
			<div class="form-group">
	    		{{ Form::label('c_name', 'Cliente:')}}
		    	<div class="form-inline">
		    		<div class="pull-left">
		    			{{ Form::text('c_firstname', null, array('class' => 'form-control'))}}
		    			<br>
		    			{{ Form::label('c_firstname', 'Nombre(s)')}}
		    		</div>
		    		<div>
		    			{{ Form::text('c_lastname', null, array('class' => 'form-control'))}}
		    			<br>
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
					<div class="col-md-3">
			    		{{ Form::label('phone', 'Teléfono:')}}
			    		{{ Form::number('phone', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
	    	</div>
	    	@if ($errors->has('phone'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('phone') }}</div>
			@endif
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
			    		{{ Form::label('email', 'Email:')}}
			    		{{ Form::email('email', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
	    	</div>
	    	@if ($errors->has('email'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
			@endif
	    	<div class="form-group">
	    		<div class="row">
	    			<div class="col-md-3">
	    				{{ Form::label('make', 'Marca:')}}
			    		<select name="make" id="make" class="form-control">
                    		@foreach ($makes as $make)
                        		<option value="{{ $make->id }}">{{ $make->name }}</option>
                   			@endforeach
                		</select>
	    			</div>
	    		</div>
	    	</div>
	    	@if ($errors->has('make'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('make') }}</div>
			@endif
	    	<div class="form-group">
	    		<div class="row">
	    			<div class="col-md-3">
	    				{{ Form::label('type', 'Línea:')}}
						{{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
	    			</div>
	    		</div>
	    	</div>
	    	@if ($errors->has('type'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('type') }}</div>
			@endif
	    	<div class="form-group">
				<div class="row">
					<div class="col-md-3">
			    		{{ Form::label('model', 'Modelo:')}}
			    		{{ Form::number('model', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
			</div>
			@if ($errors->has('model'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('model') }}</div>
			@endif
			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
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
					<div class="col-md-3">
			    		{{ Form::label('mileage', 'Kilometraje:')}}
			    		{{ Form::number('mileage', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
	    	</div>
	    	@if ($errors->has('mileage'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('mileage') }}</div>
			@endif
	    	<hr>
	    	<div class="form-group">
		    	<div class="row">
		    		<div class="col-md-12">
		    			{{Form::label('description', 'Piezas a intervenir')}}
		    			{{Form::textarea('description', null, array('class' => 'form-control', 'rows' => '3'))}}
		    		</div>
		    	</div>
		    </div>
		    @if ($errors->has('description'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('description') }}</div>
			@endif
		    <div class="form-group">
		    	<div class="row spare-options">
		    		<div class="col-md-12">
		    			{{Form::label('spare_parts', 'Repuestos asociados')}}
		    		</div>
		    		<div class="col-md-12 option">
		    			{{Form::radio('spare_parts', 'yes', false, ['id' => 'yes', 'onclick' => 'showField()', 'checked' => 'default'])}}<span>Si</span>
		    			{{Form::radio('spare_parts', 'no' , false, ['id' => 'no', 'onclick' => 'showField()'])}}<span>No</span>
		    		</div>
		    	</div>
		    </div>
		    <div class="form-group" id="spare_description">
		    	<div class="row">
		    		<div class="col-md-12">
		    			{{Form::label('spare_description', 'Repuestos')}}
		    			{{Form::textarea('spare_description', null, array('class' => 'form-control', 'rows' => '3'))}}
		    		</div>
		    	</div>
		    </div>
	    	<hr>
	    	<div class="form-group">
		    	<div class="row">
		    		<div class="col-md-12">
		    			{{Form::label('price', 'Costo de la reparación (IVA incluido)')}}
		    		</div>
		    		<div class="col-md-4">
		    			{{Form::number('price', null, array('class' => 'form-control'))}}
		    		</div>
		    	</div>
		    </div>
		    @if ($errors->has('price'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('price') }}</div>
			@endif
		    <div class="form-group">
		    	<div class="row">
		    		<div class="col-md-12">
		    			{{Form::label('time', 'Tiempo de entrega (Horas)')}}
		    		</div>
		    		<div class="col-md-4">
		    			{{Form::number('time', null, array('class' => 'form-control'))}}
		    		</div>
		    	</div>
		    </div>
		    @if ($errors->has('time'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('time') }}</div>
			@endif
		    <div class="form-group">
		    	<div class="row">
		    		<div class="col-md-12">
		    			{{Form::label('validity_time', 'Validez de la cotización (Días)')}}
		    		</div>
		    		<div class="col-md-4">
		    			{{Form::number('validity_time', null, array('class' => 'form-control'))}}
		    		</div>
		    	</div>
		    </div>
		    @if ($errors->has('validity_time'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('validity_time') }}</div>
			@endif
		    <div class="form-group">
		    	<div class="row">
		    		<div class="col-md-12">
		    			{{Form::label('observations', 'Observaciones (detalles de la cotización - USO INTERNO)')}}
		    			{{Form::textarea('observations', null, array('class' => 'form-control', 'rows' => '3'))}}
		    		</div>
		    	</div>
		    </div>
		    @if ($errors->has('observations'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('observations') }}</div>
			@endif
		</div>
	</div>
<div class="row ">
	<div class="col-xs-6 col-sm-6 col-md-4 col-md-offset-2 edit-buttons">
		<div class="col-xs-6 col-sm-6 col-md-6">
			{!! Html::linkRoute('cdocs.show', 'Cancelar', array($cdoc->id), array('class' => 'btn btn-danger btn-block edit-buttons', 'style' => 'margin-top: 30px;')) !!}
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			{{ Form::submit('Guardar', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top: 30px;')) }}
		</div>
	</div>
</div>
{!! Form::close() !!}
{{-- Scroll to top button --}}
<a class="scrollToTop" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up fa-4x" aria-hidden="true"></i></a>
@endsection
@section('scripts')
{{-- Dropdown dependent menus for make and type | Ajax request to avoid page reload and select old values if validation fails --}}
<script type="text/javascript">
$(function(){
    //Get the id for the make and type selected
    var make_id = '{{ $make_id->id }}';
    var type_id = '{{ $type->id }}';

    //Make selection
    $('#make').val(make_id).prop('selected', true);

    //Types sync
    if(make_id){
    	typeUpdate(make_id);
    }
    //Make change
    $('#make').on('change', function(e){
    	//Send the make id to typeUpdate function
    	var make_id = e.target.value;
    	type_id = false;
    	typeUpdate(make_id);
    });

    //Ajax request for types
    function typeUpdate(makeId){
    	$.get('{{ url('app/types') }}/'+makeId, function(data){
    		//Empty type list
    		$('#type').empty();
    		//Loop for new list creation
    		$.each(data, function(id, types){
    			$('#type').append($('<option>', { 
                    value: types.id,
                    text : types.name 
                }));
    		});
    		// If validation fails the previous type is selected
    		if(type_id){
    			$('#type').val(type_id).prop('selected', true);
    		}
    	});
    }
});
</script>
<script type="text/javascript">
    function showField(){
        if(document.getElementById("yes").checked){
            document.getElementById("spare_description").style.display= 'block';
        }
        else{
            document.getElementById("spare_description").style.display= 'none';
        }
    }
</script>
@endsection