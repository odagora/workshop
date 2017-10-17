@extends('main')
@section('title', '| Crear un nuevo certificado de control calidad') 
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Crear un nuevo certificado de control calidad</h1>
		<hr>
		{!! Form::open(array('name' => 'qdoc_form' , 'id' => 'qdoc_form' , 'route' => 'qdocs.store')) !!}
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
			    		{{-- <select name="make" class="form-control">
                    		<option value=""> Seleccione marca</option>
                    			@foreach ($makes as $key => $value)
                        		<option value="{{ $value }}">{{ $value }}</option>
                   			 @endforeach
                		</select> --}}
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
	    	<?php include('../storage/php/q_lists.php');?>
	    	<div class="form-group">
		    	@foreach($names as $mat=>$name)
		    		@if($mat < 6)
			    		<table class="table table-condensed">
			    			<thead>
			    				<tr>
			    					<th class="col-md-4">{{$name}}</th>
					    			@for($i=1; $i <= count($loptions); $i++)
					    				<th class="col-md-2 text-center">{{$loptions[$i]}}</th>
					    			@endfor
					    		</tr>
			    			</thead>
			    			<tbody>
			    				@for($i=1; $i <= count($list[$mat]) ; $i++)
			    					<tr>
			    						<td>{{$list[$mat][$i]}}</td>
			    						@for($j=1; $j <= count($loptions); $j++)
			    							<td class="col-md-2 text-center">
			    							{{Form::label($loptions[$j], $loptions[$j], array('style' => 'display:none'))}}
			    							{{Form::radio($matrixNames[$mat][$i], $j)}}
			    							</td>
			    						@endfor
			    					</tr>
			    				@endfor
			    			</tbody>
			    		</table>
			    	@elseif($mat==6)
			    		<table class="table table-condensed">
			    			<thead>
			    				<tr>
			    					<th class="col-md-4">{{$name}}</th>
					    			@for($i=1; $i <= count($loptions1); $i++)
					    				<th class="col-md-2 text-center">{{$loptions1[$i]}}</th>
					    			@endfor
					    		</tr>
			    			</thead>
			    			<tbody>
			    				@for($i=1; $i <= count($list[$mat]) ; $i++)
			    					<tr>
			    						<td>{{$list[$mat][$i]}}</td>
			    						@for($j=1; $j <= count($loptions1); $j++)
			    							<td class="col-md-2 text-center">
			    							{{Form::label($loptions1[$j], $loptions1[$j], array('style' => 'display:none'))}}
			    							{{Form::radio($matrixNames[$mat][$i], $j)}}
			    							</td>
			    						@endfor
			    					</tr>
			    				@endfor
			    			</tbody>
			    		</table>
			    	@else
			    		<table class="table table-condensed">
			    			<thead>
			    				<tr>
			    					<th class="col-md-4">{{$name}}</th>
					    			@for($i=1; $i <= count($loptions2); $i++)
					    				<th class="col-md-2 text-center">{{$loptions2[$i]}}</th>
					    			@endfor
					    		</tr>
			    			</thead>
			    			<tbody>
			    				@for($i=1; $i <= count($list[$mat]) ; $i++)
			    					<tr>
			    						<td>{{$list[$mat][$i]}}</td>
			    						@for($j=1; $j <= count($loptions2); $j++)
			    							<td class="col-md-2 text-center">
			    							{{Form::label($loptions2[$j], $loptions2[$j], array('style' => 'display:none'))}}
			    							{{Form::radio($matrixNames[$mat][$i], $j)}}
			    							</td>
			    						@endfor
			    					</tr>
			    				@endfor
			    			</tbody>
			    		</table>
			    	@endif
		    	@endforeach
		    </div>
	    	<hr>
	    	<h3>Semáforo</h3>
	    	@foreach ($lcomments as $com => $name)
	    		@if($com < 4)
		    		<div class="form-group">
		    			<div class="row">
		    				<div class="col-md-12">	
				    			{{Form::label('comment',$name)}}
				    		</div>
				    		<div class="col-md-12">	
				    			{{Form::textarea($comNames[$com], $comVariables[$com], array('class' => 'form-control', 'rows' => '3'))}}
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
				    			{{Form::textarea($comNames[$com], $comVariables[$com], array('class' => 'form-control', 'rows' => '3'))}}
				    		</div>
			    		</div>
		    		</div>
		    		<hr>
		    	@endif
	    	@endforeach
	    	<div class="form-group">
	    		<div class="row">
	    			<div class="col-md-5">	
				    	{{ Form::label('n_mileage', 'Próximo mantenimiento a los (kms):')}}
						{{ Form::number('n_mileage', null, array('class' => 'form-control'))}}
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						{{Form::label('e_signature', 'Firma del asesor de servicio:')}}
						<div class="sigPad">
							<div class="sig sigWrapper">
								<canvas class="pad" width="350" height="170">
								{{ Form::hidden('e_signature', null, array('class' => 'signature'))}}
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
					<div class="col-md-6">
						{{Form::label('c_signature', 'Firma del cliente:')}}
						<div class="sigPad">
							<div class="sig sigWrapper">
								<canvas class="pad" width="350" height="170">
								{{ Form::hidden('c_signature', null, array('class' => 'signature'))}}
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
			{{Form::submit('Crear Documento', array('class' => 'btn btn-success', 'style' => 'margin-top: 30px;'))}}
		{!! Form::close() !!}
	</div>
</div>
@endsection
@section('scripts')
{{-- Dropdown dependent menus for make and type | Ajax request to avoid page reload --}}
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
            }
            else{
                $('select[name="type"]').empty();
            }
        });
    });
</script>
{{-- Signature pad javascript calling and options configuration --}}
<script type="text/javascript">
	var options = {
		drawOnly : true,
		displayOnly : false,
		clear: '.button-clear',
		penColour: '#000',
		output:'.signature',
		lineTop: 160,
		lineMargin: 10,
		validateFields: false
	};
	$('.sigPad').signaturePad(options);
</script>
{{-- Signature compression before submitting to database--}}
<script type="text/javascript">
	$("#qdoc_form").submit(function(event) {
		var sig = $("#e_signature").val();
		if (sig.length > 0) {
			var result = deflateFromJsonSignature(sig);
		    $("#e_signature").val(result);
		}
		return true;
	 });
</script>
@endsection