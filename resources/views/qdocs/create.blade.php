@extends('main')
@section('title', '| Crear un nuevo certificado de control calidad') 
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Crear un nuevo certificado de control calidad</h1>
		<hr>
		{!! Form::open(['route' => 'qdocs.store']) !!}
			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{{ Form::label('created_at', 'Fecha:')}}
						{{ Form::date('created_at', \Carbon\Carbon::now(), array('class' =>'form-control'))}}
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
			    		{{ Form::label('ordernumber', 'Orden de reparación:')}}
			    		{{ Form::number('ordernumber', null, array('class' => 'form-control'))}}
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
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
			    		{{ Form::label('email', 'Email:')}}
			    		{{ Form::email('email', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
	    	</div>
	    	<div class="form-group">
	    		<div class="row">
	    			<div class="col-md-3">
	    				{{ Form::label('make', 'Marca:')}}
			    		{{ Form::select('make', $makes, null, array('placeholder' => 'Seleccione marca', 'class' => 'form-control'))}}	
	    			</div>
	    		</div>
	    	</div>
	    	<div class="form-group">
	    		<div class="row">
	    			<div class="col-md-3">
	    				{{ Form::label('type', 'Línea:')}}
			    		{{ Form::select('type',[''], null, array('class' => 'form-control'))}}	
	    			</div>
	    		</div>
	    	</div>
	    	<div class="form-group">
				<div class="row">
					<div class="col-md-3">
			    		{{ Form::label('model', 'Modelo:')}}
			    		{{ Form::number('model', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
			    		{{ Form::label('license', 'Placa:')}}
			    		{{ Form::text('license', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
	    	</div>
	    	<div class="form-group">
				<div class="row">
					<div class="col-md-3">
			    		{{ Form::label('mileage', 'Kilometraje:')}}
			    		{{ Form::number('mileage', null, array('class' => 'form-control'))}}
			    	</div>
			    </div>
	    	</div>
	    	<hr>
		{!! Form::close() !!}
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="make"]').on('change', function() {
            var makeID = $(this).val();
            if(makeID) {
                $.ajax({
                    url: '/qdocs/create/ajax/'+makeID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="type"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="type"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="type"]').empty();
            }
        });
    });
</script>
@endsection 