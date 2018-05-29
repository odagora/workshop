@extends('base')
@section('title', '| Peritaje de Vehículo Usado '.'No. '.$doc)
@section('content')
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 text-left">
		<img src="{{asset('img/logo.png')}}" class="img-responsive" alt="logo servitalleres">
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6  doc-number text-center">
		<div class="col-xs-5 col-sm-5 col-md-5 col-xs-offset-7 text-danger panel panel-default">
			<p><strong>No. {{ $doc }}</strong></p>
		</div>
	</div>
</div>
<div class="row">
	<h3 class="text-center text-uppercase m-t-10"><strong>Peritaje de Vehículo Usado @if($edoc->status == 'cancelled')<span class="text-danger">- ANULADO -</span>@endif </strong></h3>
</div>
<div class="row well m-b-5 p-l-0 p-r-0 p-t-5 p-b-5">
	<div class="col-xs-4 col-sm-4 col-md-4">
		<div class="col-xs-4 col-sm-4 col-md-4 quote-title">
			<p class="m-b-0"><strong>Fecha:</strong></p>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 panel panel-default text-center">
			<p class="m-b-0">{{ date('d/m/Y', strtotime($edoc->created_at)) }}</p>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 quote-title">
			<p class="m-b-0"><strong>Asesor:</strong></p>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 panel panel-default text-center p-l-0 p-r-0">
			<p class="m-b-0">{{ $edoc->e_firstname }} {{ $edoc->e_lastname }}</p>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4">
		<div class="col-xs-4 col-sm-4 col-md-4">
			<p class="m-b-0"><strong>Cliente: </strong></p>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 panel panel-default text-center p-l-0 p-r-0">
			<p class="m-b-0">{{ $edoc->c_firstname }} {{ $edoc->c_lastname }}</p>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
			<p class="m-b-0"><strong>Cédula: </strong></p>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 panel panel-default text-center">
			<p class="m-b-0">{{ number_format($edoc->id_number,0,",",".") }}</p>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
			<p class="m-b-0"><strong>Teléfono: </strong></p>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 panel panel-default text-center">
			<p class="m-b-0">{{$edoc->phone}}</p>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
			<p class="m-b-0"><strong>Email: </strong></p>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 panel panel-default text-center p-l-0 p-r-0">
			<p class="m-b-0">{{ $edoc->email }}</p>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4">
		<div class="col-xs-5 col-sm-5 col-md-5">
			<p class="m-b-0"><strong>Vehículo: </strong></p>
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 panel panel-default text-center">
			<p class="m-b-0">{{ $make->name }} {{ $type->name }}</p>
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5">
			<p class="m-b-0"><strong>Modelo: </strong></p>
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 panel panel-default text-center">
			<p class="m-b-0">{{ $edoc->model }}</p>
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5">
			<p class="m-b-0"><strong>Placa: </strong></p>
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 panel panel-default text-center">
			<p class="m-b-0">{{ $edoc->license }}</p>
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5">
			<p class="m-b-0"><strong>Kilometraje: </strong></p>
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 panel panel-default text-center">
			<p class="m-b-0">{{ number_format($edoc->mileage,0,",",".") }} kms</p>
		</div>
	</div>
</div>
<div class="row well m-b-10 p-l-0 p-r-0 p-t-5 p-b-5">
	<div class="col-xs-4 col-sm-4 col-md-4">
		@php
			$k=1;
		@endphp
		@foreach($names as $mat=>$name)
    		@if($mat < 3)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats); $i++)
			    				<th class="col-md-2 text-center">{{$cats[$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$i}} - {{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[$j], $cats[$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($edoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    						@php
	    							$k++;
	    						@endphp
	    						@if($mat == 2 && $k == 39)
									@break
	    						@endif
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
	    @endforeach
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4">
		@php
			$k=1;
		@endphp
		@foreach($names as $mat=>$name)
    		@if($mat == 2)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats); $i++)
			    				<th class="col-md-2 text-center">{{$cats[$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=15; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$i}} - {{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[$j], $cats[$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($edoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
    		@if($mat > 2 && $mat < 5)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats); $i++)
			    				<th class="col-md-2 text-center">{{$cats[$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$i}} - {{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[$j], $cats[$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($edoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
	    	@if($mat == 5)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats); $i++)
			    				<th class="col-md-2 text-center">{{$cats[$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$i}} - {{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[$j], $cats[$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($edoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    						@php
	    							$k++;
	    						@endphp
	    						@if($k == 7)
									@break
	    						@endif
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
	    @endforeach
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4">
		@foreach($names as $mat=>$name)
    		@if($mat == 5)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats); $i++)
			    				<th class="col-md-2 text-center">{{$cats[$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=7; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$i}} - {{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[$j], $cats[$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($edoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
    		@if($mat > 5 && $mat < 9)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats); $i++)
			    				<th class="col-md-2 text-center">{{$cats[$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$i}} - {{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[$j], $cats[$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($edoc->$elem == $j ? ' checked' : '');
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
<div class="row well m-b-5 p-l-0 p-r-0 p-t-0 p-b-0">
	<h4 class="text-center text-uppercase m-b-0"><strong>Observaciones:</strong></h4>
	<h6 class="text-center m-t-0">(Anote el número correspondiente del ítem en cada caso)</h6>
</div>
<div class="row well m-b-5 p-l-0 p-r-0 p-t-0 p-b-0">
	<div class="col-xs-12 col-sm-12 col-md-12">
		@foreach ($names as $mat=>$name)
			@php
			$com = $comments[$mat];
			$com = $edoc->$com;
			@endphp
			<div class="col-xs-6 col-sm-6 col-md-6">
				<h4 class="text-center"><strong>{{$name}}:</strong></h4>
				<div id="exp-com" class="col-xs-12 col-sm-12 col-md-12 panel panel-default">
					<h6>{{$com}}</h6>
				</div>
			</div>	
		@endforeach
	</div>
</div>
<div class="row well m-b-5 p-l-0 p-r-0 p-t-5 p-b-0">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="showSig" id="sig-employee">
			<div id="exp-sig" class="sig sigWrapper">
				<canvas class="pad" width="320" height="170">
				{{ Form::hidden('e_signature', null, array('class' => 'signature'))}}
			</div>
			<div class="sigFooter">
				<div class="description">Firma del taller</div>
			</div>
		</div>
	</div>
</div>
<div class="row footer">
	<h6 class="text-center"><strong>NOTA: El peritaje constituye una revisión exclusiva de los ítems relacionados. Cualquier daño no aparente detectado posterior a dicha revisión, no es responsabilidad del taller</strong></h6>
</div>
<hr class="m-t-5 m-b-5">
<div class="row footer">
	<h6 class="text-center">Carrera 22 N. 76-57 | Bogotá - Colombia | 2117943 - 2119290<br>www.servitalleres.com | contacto@servitalleres.com</h6>
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
			bgColour: '#fff',
			lineTop: 160,
			lineMargin: 10,
			validateFields: false
		};

		//Escaping JSON signature data from database
		var showSig_data = {!! $edoc->e_signature !!};
		$('#sig-employee').signaturePad(options).regenerate(showSig_data);
		//Get second signature only if it exists
		var showSig_data1 = '{!! ($edoc->c_signature !== null ? $edoc->c_signature : '') !!}';
		if(showSig_data1 !== ''){
			$('#sig-client').signaturePad(options).regenerate(showSig_data1);
		}
	});
</script>
@endsection