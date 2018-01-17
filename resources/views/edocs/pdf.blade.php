@extends('base')
@section('title', '| Peritaje de Vehículo Usado '.'No. '.$doc)
@section('content')
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 text-left">
		<img src="{{asset('img/logo.png')}}" class="img-responsive" alt="logo servitalleres">
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 text-right text-danger doc-number">
		<p><strong>No. {{ $doc }}</strong></p>
	</div>
</div>
<div class="row">
	<h3 class="text-center text-uppercase" style="margin-top: 10px;"><strong>Peritaje de Vehículo Usado @if($edoc->status == 'cancelled')<span class="text-danger">- ANULADO -</span>@endif </strong></h3>
</div>
<div class="row ">
	<div class="col-xs-4 col-sm-4 col-md-4">
		<div class="col-xs-4 col-sm-4 col-md-4">
			<p><strong>Fecha:</strong></p>
			<p><strong>Asesor:</strong></p>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ date('d/m/Y', strtotime($edoc->created_at)) }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $edoc->e_firstname }} {{ $edoc->e_lastname }}</p>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4">
		<div class="col-xs-4 col-sm-4 col-md-4">
			<p><strong>Cliente: </strong></p>
			<p><strong>Cédula: </strong></p>
			<p><strong>Teléfono: </strong></p>
			<p><strong>Email: </strong></p>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $edoc->c_firstname }} {{ $edoc->c_lastname }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ number_format($edoc->id_number,0,",",".") }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{$edoc->phone}}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $edoc->email }}</p>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4">
		<div class="col-xs-5 col-sm-5 col-md-5">
			<p><strong>Vehículo: </strong></p>
			<p><strong>Modelo: </strong></p>
			<p><strong>Placa: </strong></p>
			<p><strong>Kilometraje: </strong></p>
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $make->name }} {{ $type->name }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $edoc->model }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $edoc->license }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ number_format($edoc->mileage,0,",",".") }}</p>
		</div>
	</div>
</div>
<div class="row ">
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
<div class="row ">
	<h4 class="text-center text-uppercase"><strong>Observaciones:</strong></h4>
	<h6 class="text-center">(Anote el número correspondiente del ítem en cada caso)</h6>
</div>
<div class="row ">
	<div class="col-xs-12 col-sm-12 col-md-12">
		@foreach ($names as $mat=>$name)
			@php
			$com = $comments[$mat];
			$com = $edoc->$com;
			@endphp
			<div class="col-xs-6 col-sm-6 col-md-6">
				<h4 class="text-center"><strong>{{$name}}:</strong></h4>
				<div id="exp-com" class="col-xs-12 col-sm-12 col-md-12">
					<h6>{{$com}}</h6>
				</div>
			</div>	
		@endforeach
	</div>
</div>
<hr style="margin: 8px 0;">
<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="showSig" id="sig-employee">
			<div id="exp-sig" class="sig sigWrapper">
				<canvas class="pad" width="344" height="150">
				{{ Form::hidden('e_signature', null, array('class' => 'signature'))}}
			</div>
			<div class="sigFooter">
				<div class="description">Firma del taller</div>
			</div>
		</div>
	</div>
</div>
<hr style="margin: 5px 0;">
<div class="row footer">
	<h6 class="text-center"><strong>NOTA: El peritaje constituye una revisión exclusiva de los ítems relacionados. Cualquier daño no aparente detectado posterior a dicha revisión, no es responsabilidad del taller</strong></h6>
</div>
<hr style="margin: 5px 0;">
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