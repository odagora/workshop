@extends('main')
@section('title', '| Editar Peritaje de Vehículo Usado'.'No. '.$doc)
@section('content')
<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2">
		<h1 class="text-center">Editar Peritaje de Vehículo Usado # {{$doc}}</h1>
		<hr>
		{!! Form::model($edoc, ['route' => ['edocs.update', $edoc->id], 'method' => 'PUT']) !!}
		<div class="form-group">
			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3 date">
					{{ Form::label('created_at', 'Fecha:')}}
					{{ Form::date('created_at',  $edoc->created_at->format('Y-m-d'), array('class' =>'form-control'))}}
				</div>
			</div>
		</div>
    	<div class="form-group">
    		{{ Form::label('e_name', 'Asesor de servicio:')}}
	    	<div class="form-inline">
	    		<div class="col-xs-5 col-sm-3 col-md-3 pull-left names">
	    			{{ Form::text('e_firstname', null, array('class' => 'form-control'))}}
	    			<br class="break">
	    			{{ Form::label('e_firstname', 'Nombre')}}
	    		</div>
	    		<div class="col-xs-5 col-sm-3 col-md-3 names">
	    			{{ Form::text('e_lastname', null, array('class' => 'form-control'))}}
	    			<br class="break">
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
	    		<div class="col-xs-5 col-sm-3 col-md-3 pull-left names">
	    			{{ Form::text('c_firstname', null, array('class' => 'form-control'))}}
	    			<br class="break">
	    			{{ Form::label('c_firstname', 'Nombre(s)')}}
	    		</div>
	    		<div class="col-xs-5 col-sm-3 col-md-3 names">
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
		    		{{ Form::label('id_number', 'Cédula:')}}
		    		{{ Form::number('id_number', null, array('class' => 'form-control'))}}
		    	</div>
		    </div>
    	</div>
    	@if ($errors->has('id_number'))
			<br>
			<div class="alert alert-danger" role="alert">{{ $errors->first('id_number') }}</div>
		@endif
		<div class="form-group">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 mail">
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
				<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
		    		{{ Form::label('phone', 'Teléfono:')}}
		    		{{ Form::number('phone', null, array('class' => 'form-control'))}}
	    	</div>
	    </div>
	    @if ($errors->has('phone'))
			<br>
			<div class="alert alert-danger" role="alert">{{ $errors->first('phone') }}</div>
		@endif
    	</div>
    	<div class="form-group">
    		<div class="row">
    			<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
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
    			<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
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
				<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
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
    	<hr>
    	<div class="form-group">
	    	@foreach($names as $mat=>$name)
	    		<table class="table table-condensed">
	    			<thead>
	    				<tr>
	    					<th class="col-md-4">{{$name}}</th>
			    			@for($i=1; $i <= count($cats); $i++)
			    				<th class="col-md-2 text-center">{{$cats[$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td>{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats); $j++)
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[$j], $cats[$j], array('style' => 'display:none'))}}
	    							{{Form::radio($elements[$mat][$i], $j)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    		@php
	    		$m[$mat] = str_replace('_', ' ', $elements[$mat]);
	    		$e[$mat] = str_replace(' es requerido.', '',$errors->all());
	    		@endphp
	           @if(count(array_intersect($m[$mat], $e[$mat])) > 0)
					<br>
					<div class="alert alert-danger" role="alert">Todos los campos de la tabla "{{$name}}" son requeridos.</div>
			   @endif            
	    	@endforeach
	    </div>
    	<hr>
    	<h3>Observaciones</h3>
    	<h5>Anote el número correspondiente al ítem en cada caso antes de comenzar a escribir</h5>
    	@foreach ($names as $com => $name)
    		<div class="form-group">
    			<div class="row">
    				<div class="col-md-12">	
		    			{{Form::label('comment',$name)}}
		    		</div>
		    		<div class="col-md-12">	
		    			{{Form::textarea('comment'.$com, null, array('class' => 'form-control', 'rows' => '3'))}}
		    		</div>
	    		</div>
    		</div>
    	@endforeach
    	<hr>
    	<div class="form-group">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 signature">
					{{Form::label('e_signature', 'Firma del asesor de servicio:')}}
					<div class="sigPad" id="sig-employee">
						<div class="sig sigWrapper">
							<canvas class="pad create-pad">
							{{ Form::hidden('e_signature', null, array('class' => 'e_signature'))}}
						</div>
						<div class="sigFooter">
							<div class="description">Firme arriba</div>
							<div class="sigActions">
								<div>
									<button type="button" class="button-clear">Borrar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 signature">
					{{Form::label('c_signature', 'Firma del cliente:')}}
					<div class="sigPad" id="sig-client">
						<div class="sig sigWrapper">
							<canvas class="pad create-pad">
							{{ Form::hidden('c_signature', null, array('class' => 'c_signature'))}}
						</div>
						<div class="sigFooter">
							<div class="description">Firme arriba</div>
							<div class="sigActions">
								<div>
									<button type="button" class="button-clear">Borrar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@if ($errors->has('e_signature'))
			<br>
			<div class="alert alert-danger" role="alert">{{ $errors->first('e_signature') }}</div>
		@endif
	</div>
</div>
<div class="row ">
	<div class="col-xs-6 col-sm-6 col-md-4 col-md-offset-2 edit-buttons">
		<div class="col-xs-6 col-sm-6 col-md-6">
			{!! Html::linkRoute('edocs.show', 'Cancelar', array($edoc->id), array('class' => 'btn btn-danger btn-block edit-buttons', 'style' => 'margin-top: 30px;')) !!}
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
{{-- Signature pad javascript calling and options configuration --}}
<script type="text/javascript">
	var options = {
		drawOnly : false,
		displayOnly : true,
		penColour: '#000',
		lineTop: 160,
		lineMargin: 10,
		validateFields: false
	};

	var sigpad_data = $('.e_signature').val();
	$('#sig-employee').signaturePad(options).regenerate(sigpad_data);

	var options1 = {
		drawOnly : true,
		displayOnly : false,
		clear: '.button-clear',
		penColour: '#000',
		output:'.c_signature',
		lineTop: 160,
		lineMargin: 10,
		validateFields: false
	};

	var sigpad_data1 = $('.c_signature').val();
	if(sigpad_data1 !== ''){
		$('#sig-client').signaturePad(options).regenerate(sigpad_data1);
		$('.sigActions').hide();
	}
	else{
		$('#sig-client').signaturePad(options1);
	}
</script>
@endsection