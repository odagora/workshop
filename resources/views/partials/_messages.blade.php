@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Correcto: </strong>{{ Session::get('success') }}
	</div>
@endif
@if(Session::has('warning'))
	<div class="alert alert-warning" role="warning">
		<strong>Atención: </strong>{{ Session::get('warning') }}
	</div>
@endif
@if(Session::has('danger'))
	<div class="alert alert-danger" role="danger">
		<strong>Atención: </strong>{{ Session::get('danger') }}
	</div>
@endif