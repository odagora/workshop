@extends('main')
@section('title', '| Crear una cotización de colisión exprés') 
@section('content')
<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2">
		<h1 class="text-center">Crear una cotización de colisión exprés</h1>
		<hr>
		{!! Form::open(array('name' => 'cdoc_form' , 'id' => 'cdoc_form' , 'route' => 'cdocs.store')) !!}
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
		    			{{ Form::text('e_firstname', null, array('class' => 'form-control', 'maxlength' => 19, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.e_firstname,this.form.count1,19)'))}}
		    			<br class="break">
		    			{{ Form::label('e_firstname', 'Nombre')}}
		    		</div>
		    		<div class="col-xs-5 col-sm-3 col-md-3 names">
		    			{{ Form::text('e_lastname', null, array('class' => 'form-control', 'maxlength' => 10, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.e_lastname,this.form.count2,10)'))}}
		    			<br class="break">
		    			{{ Form::label('e_lastname', 'Apellido')}}
					</div>
				</div>
				<div class="form-inline" style="display: none;">
					<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count1" size="3" value="19" class="form-control text-center">
		    		</div>
		    		<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count2" size="3" value="10" class="form-control text-center">
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
		    			{{ Form::text('c_firstname', null, array('class' => 'form-control', 'maxlength' => 20, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.c_firstname,this.form.count3,20)'))}}
		    			<br class="break">
		    			{{ Form::label('c_firstname', 'Nombre(s)')}}
		    		</div>
		    		<div class="col-xs-5 col-sm-3 col-md-3 pull-left names">
		    			{{ Form::text('c_lastname', null, array('class' => 'form-control', 'maxlength' => 16, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.c_lastname,this.form.count4,16)'))}}
		    			<br class="break">
		    			{{ Form::label('c_lastname', 'Apellido')}}
					</div>
				</div>
				<div class="form-inline" style="display: none;">
					<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count3" size="3" value="20" class="form-control text-center">
		    		</div>
		    		<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count4" size="3" value="16" class="form-control text-center">
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
			    		{{ Form::label('phone', 'Teléfono:')}}
			    		{{ Form::number('phone', null, array('class' => 'form-control', 'maxlength' => 11, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.phone,this.form.count5,11)'))}}
			    	</div>
			    </div>
			    <div class="row" style="display: none;">
			    	<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count5" size="3" value="11" class="form-control text-center">
		    		</div>
			    </div>
	    	</div>
	    	@if ($errors->has('phone'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('phone') }}</div>
			@endif
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 mail">
			    		{{ Form::label('email', 'Email:')}}
			    		{{ Form::email('email', null, array('class' => 'form-control', 'maxlength' => 37, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.email,this.form.count6,37)'))}}
			    	</div>
			    </div>
			    <div class="row" style="display: none;">
			    	<div class="col-xs-4 col-sm-2 col-md-2">
		    			<input readonly type="text" name= "count6" size="3" value="37" class="form-control text-center">
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
		    	<div class="row">
		    		<div class="col-md-12">
		    			{{Form::label('description', 'Piezas a intervenir')}}
		    			{{Form::textarea('description', null, array('class' => 'form-control', 'rows' => '3','maxlength' => 288, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.description, this.form.countdown, 288)'))}}
		    		</div>
		    		<div class="col-xs-4 col-sm-2 col-md-2 col-xs-offset-8 col-sm-offset-10 col-md-offset-10">
		    			<input readonly type="text" name="countdown" size="3" value="288" class="form-control text-center">
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
		    			{{Form::textarea('spare_description', null, array('class' => 'form-control', 'rows' => '3','maxlength' => 88, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.spare_description, this.form.countdown1, 88)'))}}
		    		</div>
		    		<div class="col-xs-4 col-sm-2 col-md-2 col-xs-offset-8 col-sm-offset-10 col-md-offset-10">
		    			<input readonly type="text" name="countdown1" size="3" value="88" class="form-control text-center">
		    		</div>
		    	</div>
		    </div>
	    	<hr>
	    	<div class="form-group">
		    	<div class="row">
		    		<div class="col-md-12">
		    			{{Form::label('price', 'Costo de la reparación (IVA incluido)')}}
		    		</div>
		    		<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
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
		    		<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
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
		    		<div class="col-xs-4 col-sm-4 col-md-3 gen-field">
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
		    			{{Form::textarea('observations', null, array('class' => 'form-control', 'rows' => '3', 'maxlength' => 300, 'onKeyDown' => 'limitTextOnKeyUpDown(this.form.observations, this.form.countdown2, 300)'))}}
		    		</div>
		    		<div class="col-xs-4 col-sm-2 col-md-2 col-xs-offset-8 col-sm-offset-10 col-md-offset-10">
		    			<input readonly type="text" name="countdown2" size="3" value="300" class="form-control text-center">
		    		</div>
		    	</div>
		    </div>
		    @if ($errors->has('observations'))
				<br>
				<div class="alert alert-danger" role="alert">{{ $errors->first('observations') }}</div>
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
{{-- Function to show/hide spare parts description field --}}
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