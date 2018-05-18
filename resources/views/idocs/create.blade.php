@extends('main')
@section('title', '| Crear un nuevo informe de inspección visual') 
@section('content')
<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2">
		<h1 class="text-center">Crear un nuevo informe de inspección visual</h1>
		<hr>
		{!! Form::open(array('name' => 'idoc_form' , 'id' => 'idoc_form' , 'route' => 'idocs.store')) !!}
			<div class="form-group">
				<div class="row">
					<div class="col-xs-4 col-sm-3 col-md-3 date">
						{{ Form::label('created_at', 'Fecha:')}}
						{{ Form::date('created_at', \Carbon\Carbon::now(), array('class' =>'form-control'))}}
					</div>
				</div>
			</div>
	    	<div class="form-group">
	    		{{ Form::label('e_name', 'Asesor de servicio:')}}
		    	<div class="form-inline">
		    		<div class="col-xs-5 col-sm-3 col-md-3 pull-left names">
		    			{{ Form::text('e_firstname', null, array('class' => 'form-control', 'maxlength' => 32, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.e_firstname,this.form.count1,32)'))}}
		    			<br class="break">
		    			{{ Form::label('e_firstname', 'Nombre')}}
		    		</div>
		    		<div class="col-xs-5 col-sm-3 col-md-3 names">
		    			{{ Form::text('e_lastname', null, array('class' => 'form-control', 'maxlength' => 32, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.e_lastname,this.form.count2,32)'))}}
		    			<br class="break">
		    			{{ Form::label('e_lastname', 'Apellido')}}
					</div>
				</div>
				<div class="form-inline" style="display: none;">
					<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count1" size="3" value="32" class="form-control text-center">
		    		</div>
		    		<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count2" size="3" value="32" class="form-control text-center">
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
		    			{{ Form::text('c_firstname', null, array('class' => 'form-control', 'maxlength' => 32, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.c_firstname,this.form.count3,32)'))}}
		    			<br class="break">
		    			{{ Form::label('c_firstname', 'Nombre(s)')}}
		    		</div>
		    		<div class="col-xs-5 col-sm-3 col-md-3 names">
		    			{{ Form::text('c_lastname', null, array('class' => 'form-control', 'maxlength' => 32, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.c_lastname,this.form.count4,32)'))}}
		    			<br class="break">
		    			{{ Form::label('c_lastname', 'Apellido')}}
					</div>
				</div>
				<div class="form-inline" style="display: none;">
					<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count3" size="3" value="32" class="form-control text-center">
		    		</div>
		    		<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count4" size="3" value="32" class="form-control text-center">
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
			    		{{ Form::number('phone', null, array('class' => 'form-control', 'maxlength' => 10, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.phone,this.form.count5,10)'))}}
			    	</div>
			    </div>
			    <div class="row" style="display: none;">
			    	<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count5" size="3" value="10" class="form-control text-center">
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
		    		@if($mat < 9)
			    		<table class="table table-condensed">
			    			<thead>
			    				<tr>
			    					<th class="col-md-4">{{$name}}</th>
					    			@for($i=1; $i <= count($cats[1]); $i++)
					    				<th class="col-md-2 text-center">{{$cats[1][$i]}}</th>
					    			@endfor
					    		</tr>
			    			</thead>
			    			<tbody>
			    				@for($i=1; $i <= count($items[$mat]) ; $i++)
			    					<tr>
			    						<td>{{$items[$mat][$i]}}</td>
			    						@for($j=1; $j <= count($cats[1]); $j++)
			    							<td class="col-md-2 text-center">
			    							{{Form::label($cats[1][$j], $cats[1][$j], array('style' => 'display:none'))}}
			    							{{Form::radio($elements[$mat][$i], $j)}}
			    							</td>
			    						@endfor
			    					</tr>
			    				@endfor
			    			</tbody>
			    		</table>
			    		@php
			    		$m[$mat] = str_replace('_', ' ', $elements[$mat]);
			    		$e[$mat] = str_replace(' es requerido.', '', $errors->all());
			    		@endphp
			           @if(count(array_intersect($m[$mat], $e[$mat])) > 0)
							<br>
							<div class="alert alert-danger" role="alert">Todos los campos de la tabla "{{$name}}" son requeridos.</div>
					   @endif            
			    	@elseif($mat==9)
			    		<table class="table table-condensed">
			    			<thead>
			    				<tr>
			    					<th class="col-md-4">{{$name}}</th>
					    			@for($i=1; $i <= count($cats[2]); $i++)
					    				<th class="col-md-2 text-center">{{$cats[2][$i]}}</th>
					    			@endfor
					    		</tr>
			    			</thead>
			    			<tbody>
			    				@for($i=1; $i <= count($items[$mat]) ; $i++)
			    					<tr>
			    						<td>{{$items[$mat][$i]}}</td>
			    						@for($j=1; $j <= count($cats[2]); $j++)
			    							<td class="col-md-2 text-center">
			    							{{Form::label($cats[2][$j], $cats[2][$j], array('style' => 'display:none'))}}
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
			    	@elseif($mat==10)
			    		<table class="table table-condensed">
			    			<thead>
			    				<tr>
			    					<th class="col-md-4">{{$name}}</th>
					    			@for($i=1; $i <= count($cats[3]); $i++)
					    				<th class="col-md-2 text-center">{{$cats[3][$i]}}</th>
					    			@endfor
					    		</tr>
			    			</thead>
			    			<tbody>
			    				@for($i=1; $i <= count($items[$mat]) ; $i++)
			    					<tr>
			    						<td>{{$items[$mat][$i]}}</td>
			    						@for($j=1; $j <= count($cats[3]); $j++)
			    							<td class="col-md-2 text-center">
			    							{{Form::label($cats[3][$j], $cats[3][$j], array('style' => 'display:none'))}}
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
			    	@else
			    		<table class="table table-condensed">
			    			<thead>
			    				<tr>
			    					<th class="col-md-4">{{$name}}</th>
					    			@for($i=1; $i <= count($cats[1]); $i++)
					    				<th class="col-md-2 text-center">{{$cats[1][$i]}}</th>
					    			@endfor
					    		</tr>
			    			</thead>
			    			<tbody>
			    				@for($i=1; $i <= count($items[$mat]) ; $i++)
			    					<tr>
			    						<td>{{$items[$mat][$i]}}</td>
			    						@for($j=1; $j <= count($cats[1]); $j++)
			    							<td class="col-md-2 text-center">
			    							{{Form::label($cats[1][$j], $cats[1][$j], array('style' => 'display:none'))}}
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
			    	@endif
		    	@endforeach
		    </div>
	    	<hr>
	    	<h3>Semáforo</h3>
	    	@foreach ($comments as $com => $name)
	    		@php
	    			$com_name = 'comment'.$com;
	    			$args = 'this.form.'.$com_name;
	    			$args2 = 'countdown'.$com;
	    			$args3 = 'this.form.'.$args2;
	    			$max_length = 'limitTextOnKeyUpDown('.$args.','.$args3.','.'400)';
				@endphp
	    		@if($com < 4)
		    		<div class="form-group">
		    			<div class="row">
		    				<div class="col-md-12">	
				    			{{Form::label('comment',$name)}}
				    		</div>
				    		<div class="col-md-12">	
				    			{{Form::textarea('comment'.$com, null, array('class' => 'form-control', 'rows' => '3', 'maxlength' => 400, 'onKeyDown' => $max_length))}}
				    		</div>
				    		<div class="col-xs-4 col-sm-2 col-md-2 col-xs-offset-8 col-sm-offset-10 col-md-offset-10">
				    			<input readonly type="text" name= {{$args2}} size="3" value="400" class="form-control text-center">
				    		</div>
			    		</div>
		    		</div>
		    	@else
		    	<hr>
		    	<div class="form-group">
		    			<div class="row">
		    				<div class="col-md-12">	
				    			{{Form::label('comment',$name)}}
				    		</div>
				    		<div class="col-md-12">	
				    			{{Form::textarea('comment'.$com, null, array('class' => 'form-control', 'rows' => '3','maxlength' => 400, 'onKeyDown' => $max_length))}}
				    		</div>
				    		<div class="col-xs-4 col-sm-2 col-md-2 col-xs-offset-8 col-sm-offset-10 col-md-offset-10">
			    			<input readonly type="text" name= {{$args2}} size="3" value="400" class="form-control text-center">
			    		</div>
			    		</div>
		    		</div>
		    		<hr>
		    	@endif
	    	@endforeach
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
				</div>
			</div>
			@if ($errors->has('e_signature'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('e_signature') }}</div>
			@endif
			{{Form::submit('Crear Documento', array('class' => 'btn btn-success', 'style' => 'margin-top: 30px;'))}}
		{!! Form::close() !!}
	</div>
</div>
{{-- Scroll to top button --}}
<a class="scrollToTop" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up fa-4x" aria-hidden="true"></i></a>
@endsection
@section('scripts')
{{-- Dropdown dependent menus for make and type | Ajax request to avoid page reload and select old values if validation fails --}}
<script type="text/javascript">
$(function(){
    //Get the id for the make and type selected
    var make_id = '{{ old('make', null) }}';
    var type_id = '{{ old('type', null) }}';

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
{{-- Max length function to show alert on browser --}}
<script type="text/javascript">
	function limitTextOnKeyUpDown(limitField, limitCount, limitNum) {	
		if (limitField.value.length >= limitNum) {
		var msg = "Ha alcanzado el máximo de caracteres permitido para este campo";
		alert(msg);
		}
		else {
        limitCount.value = limitNum - limitField.value.length;
      }
	}
</script>
{{-- Signature pad javascript calling and options configuration --}}
<script type="text/javascript">
	var options = {
		drawOnly : true,
		displayOnly : false,
		clear: '.button-clear',
		penColour: '#000',
		output:'.e_signature',
		lineTop: 160,
		lineMargin: 10,
		validateFields: false
	};
	$('#sig-employee').signaturePad(options);
</script>
@endsection