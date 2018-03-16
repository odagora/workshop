@extends('main')
@section('title', '| Subir Imágenes DTC Orden de Reparación')
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Subir Imágenes DTC Orden de Reparación</h1>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-xs-8 col-sm-8 col-md-6 col-xs-offset-2 col-sm-offset-2 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<h4><strong>Subir imágenes</strong></h4>
			</div>
			<div class="panel-body">
				{!! Form::open(array('method'=>'POST', 'role'=>'form', 'route'=> ['UploadDTCImage', $doc_id], 'files'=> true)) !!}
					@if(session()->has('status'))
                       <div class="alert alert-info" role="alert">
                           {{session()->get('status')}}
                       </div>
                   @endif
					<div class="form-group">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
								{{Form::file('image_name', array('class'=>'form-control', 'id'=>'name'))}}
								{{Form::submit('Subir Imágen', array('class' => 'btn btn-success', 'style' => 'margin-top: 15px;'))}}
							</div>
						</div>
					</div>
					@if ($errors->has('image_name'))
						<div class="alert alert-danger" role="alert">{{ $errors->first('image_name') }}</div>
					@endif
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection