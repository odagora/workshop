@extends('main')
@section('title', '| Informe de Inspección Visual '.'No. '.$idoc->id)
@section('content')
<div class="row">
	<h2 class="text-center text-uppercase">Informe de Inspección Visual # {{$idoc->id}} @if($idoc->status == 'cancelled')<span class="text-danger">- ANULADO -</span>@endif</h2>
	<hr>
</div>
<div class="row well">
	<div class="header-info col-xs-12 col-sm-3 col-md-4">
		<div class="col-xs-6 col-sm-6 col-md-4">
			<p><strong>Fecha:</strong></p>
			<p><strong>Asesor:</strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ date('d/m/Y', strtotime($idoc->created_at)) }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $idoc->e_firstname }} {{ $idoc->e_lastname }}</p>
		</div>
	</div>
	<div class="header-info col-xs-12 col-sm-5 col-md-4">
		<div class="col-xs-6 col-sm-5 col-md-4">
			<p><strong>Cliente: </strong></p>
			<p><strong>Cédula: </strong></p>
			<p><strong>Teléfono: </strong></p>
			<p><strong>Email: </strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $idoc->c_firstname }} {{ $idoc->c_lastname }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ number_format($idoc->id_number,0,",",".") }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{$idoc->phone}}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $idoc->email }}</p>
		</div>
	</div>
	<div class="header-info col-xs-12 col-sm-4 col-md-4">
		<div class="col-xs-6 col-sm-6 col-md-5">
			<p><strong>Vehículo: </strong></p>
			<p><strong>Modelo: </strong></p>
			<p><strong>Placa: </strong></p>
			<p><strong>Kilometraje: </strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-7">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $make->name }} {{ $type->name }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $idoc->model }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $idoc->license }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ number_format($idoc->mileage,0,",",".") }}</p>
		</div>
	</div>
</div>
<div class="row well">
	<h4 class="text-center text-uppercase"><strong>Puntos de inspección</strong></h4>
</div>
<div class="row well">
	<div class="col-xs-12 col-sm-6 col-md-6">
		@php
			$k=1;
		@endphp
		@foreach($names as $mat=>$name)
    		@if($mat < 6)
	    		<table class="table table-condensed">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats[1]); $i++)
			    				<th class="col-md-2 text-center">{{$cats[1][$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[1]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[1][$j], $cats[1][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($idoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    					@php
								$k++;
							@endphp
							@if($mat == 5 && $k == 31)
								@break
							@endif
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
	    @endforeach
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		@php
			$k=1;
		@endphp
		@foreach($names as $mat=>$name)
			@if($mat == 5)
	    		<table class="table table-condensed">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats[1]); $i++)
			    				<th class="col-md-2 text-center">{{$cats[1][$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=4; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[1]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[1][$j], $cats[1][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($idoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
    		@elseif($mat > 5 && $mat < 9)
	    		<table class="table table-condensed">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats[1]); $i++)
			    				<th class="col-md-2 text-center">{{$cats[1][$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[1]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[1][$j], $cats[1][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($idoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@elseif($mat == 9)
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
	    						<td class="col-md-4">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[2]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[2][$j], $cats[2][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($idoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@elseif($mat == 10)
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
	    						<td class="col-md-4">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[3]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[3][$j], $cats[3][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($idoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@elseif($mat == 11)
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
	    						<td class="col-md-4">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[1]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[1][$j], $cats[1][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($idoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
	    @endforeach
	</div>
</div>
<div class="row well">
	<h4 class="text-center text-uppercase"><strong>Importante:</strong></h4>
	<h4 class="text-center"><strong>Los controles realizados son únicamente sobre los elementos visibles del vehículo y no implican desmontaje alguno, por lo tanto el taller no asume responsabilidad en caso de la no detección de una falla no aparente.</strong></h4>
</div>
<div class="row well">
	<h4 class="text-center"><strong>Llamamos la atención sobre los siguientes trabajos pendientes de realizar:</strong></h4>
</div>
<div class="row well">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center"><strong>Semáforo</strong></h4>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-center"><strong>Comentarios</strong></h4>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="fire col-xs-4 col-sm-4 col-md-4">
			<svg>
				<circle cx="50%" cy="50%" r="50" stroke="red" stroke-width="3" fill="red" />
				<text x="50%" y="50%" text-anchor="middle" stroke="#1A1A1A" stroke-width="0.5px" dy=".3em">Inmediato</text>
			</svg>
		</div>
		<div class="comments col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-justify">{{$idoc->comment1}}</h4>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="fire col-xs-4 col-sm-4 col-md-4">
			<svg>
				<circle cx="50%" cy="50%" r="50" stroke="yellow" stroke-width="3" fill="yellow" />
				<text x="50%" y="50%" text-anchor="middle" stroke="#1A1A1A" stroke-width="0.5px" dy=".3em">De ser posible</text>
			</svg>
		</div>
		<div class="comments col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-justify">{{$idoc->comment2}}</h4>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="fire col-xs-4 col-sm-4 col-md-4">
			<svg>
				<circle cx="50%" cy="50%" r="50" stroke="green" stroke-width="3" fill="green" />
				<text x="50%" y="50%" text-anchor="middle" stroke="#1A1A1A" stroke-width="0.5px" dy=".3em">A prever</text>
			</svg>
		</div>
		<div class="comments col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-justify">{{$idoc->comment3}}</h4>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="comments col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center"><strong>Observaciones:</strong></h4>
		</div>
		<div class="comments col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-justify">{{$idoc->comment4}}</h4>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="comments col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center"><strong>Otros latonería y pintura:</strong></h4>
		</div>
		<div class="comments col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-justify">{{$idoc->comment5}}</h4>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 well">
		<div class="showSig" id="sig-employee">
			<div id="exp-sig" class="sig sigWrapper">
				<canvas class="pad" width="415" height="170">
				{{ Form::hidden('e_signature', null, array('class' => 'signature'))}}
			</div>
			<div class="sigFooter">
				<div class="description">Firma del taller</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 text-center">
			<div class="col-md-6">
				{!! Html::linkRoute('idocs.edit', 'Editar', array($idoc->id), array('class' => 'btn btn-warning btn-block')) !!}
			</div>
			@if (Auth::user()->hasRole('Admin'))
				<div class="col-md-6">
					{!! Form::open(array('route' => ['idocs.destroy', $idoc->id], 'method' => 'DELETE')) !!}
						{{Form::submit('Eliminar', array('class' => 'btn btn-danger btn-block'))}}
					{!! Form::close() !!}	
				</div>
			@endif
		</div>
	</div>
</div>
{{-- Scroll to top button --}}
<a class="scrollToTop" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up fa-4x" aria-hidden="true"></i></a>
@endsection
@section('scripts')
{{-- Signature pad javascript calling and options configuration --}}
<script type="text/javascript">
	$(function(){
		var options = {
			drawOnly : false,
			displayOnly : true,
			penColour: '#000',
			bgColour: '#f5f5f5',
			lineTop: 160,
			lineMargin: 10,
			validateFields: false
		};

		//Escaping JSON signature data from database
		var showSig_data = {!! $idoc->e_signature !!};
		$('#sig-employee').signaturePad(options).regenerate(showSig_data);
		//Get second signature only if it exists
		var showSig_data1 = '{!! ($idoc->c_signature !== null ? $idoc->c_signature : '') !!}';
		if(showSig_data1 !== ''){
			$('#sig-client').signaturePad(options).regenerate(showSig_data1);
		}
	});
</script>
@endsection