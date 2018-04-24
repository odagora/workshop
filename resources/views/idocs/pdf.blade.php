@extends('base')
@section('title', '| Inspección Visual de Mecánica y Colisión '.'No. '.$doc)
@section('content')
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 text-left">
		<img src="{{asset('img/logo.png')}}" class="img-responsive" alt="logo servitalleres">
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 text-right text-danger doc-number">
		<div class="col-xs-5 col-sm-5 col-md-5 col-xs-offset-7 text-center panel panel-default">
			<p><strong>No. {{ $doc }}</strong></p>
		</div>
	</div>
</div>
<div class="row">
	<h3 class="text-center text-uppercase" style="margin-bottom: 5px;"><strong>Inspección Visual de Mecánica y Colisión @if($idoc->status == 'cancelled')<span class="text-danger">- ANULADO -</span>@endif </strong></h3>
</div>
<div class="row well quote">
	<div class="col-xs-4 col-sm-4 col-md-4" style="padding: 0">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="col-xs-6 col-sm-4 col-md-4 quote-title">
				<h6><strong>Fecha:</strong></h6>
			</div>
			<div class="col-xs-6 col-sm-8 col-md-8 text-center panel panel-default">
				<h6>{{ date('d/m/Y', strtotime($idoc->created_at)) }}</h6>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="col-xs-3 col-sm-4 col-md-4 quote-title">
				<h6><strong>Asesor:</strong></h6>
			</div>
			<div class="col-xs-9 col-sm-8 col-md-8 text-center panel panel-default" style="padding: 0">
				<h6>{{ $idoc->e_firstname }} {{ $idoc->e_lastname }}</h6>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4" style="padding: 0">
		<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0 10px">	
			<div class="col-xs-3 col-sm-4 col-md-4 quote-title">
				<h6><strong>Cliente: </strong></h6>
			</div>
			<div class="col-xs-9 col-sm-8 col-md-8 text-center panel panel-default" style="padding: 0">
				<h6>{{ $idoc->c_firstname }} {{ $idoc->c_lastname }}</h6>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0 10px">
			<div class="col-xs-5 col-sm-4 col-md-4 quote-title">
				<h6><strong>Cédula: </strong></h6>
			</div>
			<div class="col-xs-7 col-sm-8 col-md-8 text-center panel panel-default">
				<h6>{{ number_format($idoc->id_number,0,",",".") }}</h6>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0 10px">
			<div class="col-xs-4 col-sm-4 col-md-4 quote-title">	
				<h6><strong>Teléfono: </strong></h6>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 text-center panel panel-default">
				<h6>{{$idoc->phone}}</h6>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0 10px">
			<div class="col-xs-2 col-sm-4 col-md-4 quote-title">
				<h6><strong>Email: </strong></h6>
			</div>
			<div class="col-xs-10 col-sm-8 col-md-8 text-center panel panel-default" style="padding: 0; margin: 0">
				<h6>{{ $idoc->email }}</h6>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4">
		<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0 10px">
			<div class="col-xs-4 col-sm-5 col-md-5 quote-title">
				<h6><strong>Vehículo: </strong></h6>
			</div>
			<div class="col-xs-8 col-sm-7 col-md-7 text-center panel panel-default" style="padding: 0">
				<h6>{{ $make->name }} {{ $type->name }}</h6>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0 10px">
			<div class="col-xs-6 col-sm-5 col-md-5 quote-title">
				<h6><strong>Modelo: </strong></h6>
			</div>
			<div class="col-xs-6 col-sm-7 col-md-7 text-center panel panel-default">
				<h6>{{ $idoc->model }}</h6>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0 10px">
			<div class="col-xs-6 col-sm-5 col-md-5 quote-title">
				<h6><strong>Placa: </strong></h6>
			</div>
			<div class="col-xs-6 col-sm-7 col-md-7 text-center panel panel-default">
				<h6>{{ $idoc->license }}</h6>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0 10px">
			<div class="col-xs-6 col-sm-5 col-md-5 quote-title">
				<h6><strong>Kilometraje: </strong></h6>
			</div>
			<div class="col-xs-6 col-sm-7 col-md-7 text-center panel panel-default" style="padding: 0; margin: 0">
				<h6>{{ number_format($idoc->mileage,0,",",".") }} kms</h6>
			</div>
		</div>
	</div>
</div>
<div class="row well quote table-items">
	<div class="col-xs-6 col-sm-6 col-md-6">
		@php
			$k=1;
		@endphp
		@foreach($names as $mat=>$name)
    		@if($mat < 6)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
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
	    						@php
	    							$k++;
	    						@endphp
	    						@if($mat == 5 && $k == 31)
									@break
	    						@endif
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
	    @endforeach
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		@php
			$k=1;
		@endphp
		@foreach($names as $mat=>$name)
    		@if($mat == 5)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
	    			<thead>
	    				<tr>
	    					<th class="col-md-4">{{$name}}</th>
			    			@for($i=1; $i <= count($cats[1]); $i++)
			    				<th class="col-md-2 text-center">{{$cats[1][$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=4; $i <= count($items[$mat]) ; $i++)
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
    		@elseif($mat > 5 && $mat < 9)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
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
	    	@elseif($mat == 9)
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
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
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
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
	    		<table class="table table-condensed table-compact" style="margin-bottom: 0;">
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
<div class="row well quote">
	<h5 class="text-center" style="margin: 0"><strong>Llamamos la atención sobre los siguientes aspectos a realizar al vehículo:</strong></h5>
</div>
<div class="row well quote">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="col-xs-4 col-sm-4 col-md-4">
			<h5 class="text-center"><strong>Semáforo</strong></h5>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8">
			<h5 class="text-center"><strong>Comentarios</strong></h5>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="fire col-xs-4 col-sm-4 col-md-4">
			<svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
				<circle cx="50%" cy="50%" r="48%" stroke="red" stroke-width="3" fill="red" />
				<text class="svg-text" x="50%" y="50%" text-anchor="middle" stroke="#1A1A1A" stroke-width="0.5px" dy=".3em">Inmediato</text>
			</svg>
		</div>
		<div class="pdf-comments col-xs-8 col-sm-8 col-md-8">
			<h5 class="text-justify">{{$idoc->comment1}}</h5>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="fire col-xs-4 col-sm-4 col-md-4">
			<svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
				<circle cx="50%" cy="50%" r="48%" stroke="yellow" stroke-width="3" fill="yellow" />
				<text class="svg-text" x="50%" y="50%" text-anchor="middle" stroke="#1A1A1A" stroke-width="0.5px" dy=".3em">De ser posible</text>
			</svg>
		</div>
		<div class="pdf-comments col-xs-8 col-sm-8 col-md-8">
			<h5 class="text-justify">{{$idoc->comment2}}</h5>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="fire col-xs-4 col-sm-4 col-md-4">
			<svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
				<circle cx="50%" cy="50%" r="48%" stroke="green" stroke-width="3" fill="green" />
				<text class="svg-text" x="50%" y="50%" text-anchor="middle" stroke="#1A1A1A" stroke-width="0.5px" dy=".3em">A prever</text>
			</svg>
		</div>
		<div class="pdf-comments col-xs-8 col-sm-8 col-md-8">
			<h5 class="text-justify">{{$idoc->comment3}}</h5>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="pdf-comments col-xs-4 col-sm-4 col-md-4">
			<h5 class="text-center"><strong>Observaciones:</strong></h5>
		</div>
		<div class="pdf-comments col-xs-8 col-sm-8 col-md-8">
			<h5 class="text-justify">{{$idoc->comment4}}</h5>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="pdf-comments col-xs-4 col-sm-4 col-md-4">
			<h5 class="text-center"><strong>Otros latonería y pintura:</strong></h5>
		</div>
		<div class="pdf-comments col-xs-8 col-sm-8 col-md-8">
			<h5 class="text-justify">{{$idoc->comment5}}</h5>
		</div>
	</div>
</div>
<div class="row well quote">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="showSig" id="sig-employee">
			<div id="exp-sig" class="sig sigWrapper">
				<canvas class="pad" width="325" height="150">
				{{ Form::hidden('e_signature', null, array('class' => 'signature'))}}
			</div>
			<div class="sigFooter">
				<div class="description">Firma del taller</div>
			</div>
		</div>
	</div>
</div>
<div class="row footer">
	<h6 class="text-center"><strong>NOTA: La inspección visual no implica desarme ni uso de equipos de diagnóstico. No se responde por daños no aparentes.</strong></h6>
</div>
<hr style="margin: 5px 0">
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
	var showSig_data = {!! $idoc->e_signature !!};
	$('#sig-employee').signaturePad(options).regenerate(showSig_data);
});
</script>
@endsection