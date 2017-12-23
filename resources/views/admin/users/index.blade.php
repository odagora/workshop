@extends('main')
@section('title', '| Admin Panel Principal')
@section('content')
<div class="row-">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Administración de Usuarios</h1>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-12 table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center">id</th>
				<th class="text-center">Nombre</th>
				<th class="text-center">Email</th>
				<th class="text-center">Fecha de Creación</th>
				<th class="text-center">Administrador</th>
				<th class="text-center">Usuario</th>
				<th class="text-center">Opciones</th>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td class="text-center">{{$user->id}}</td>
						<td class="text-center">{{$user->name}}</td>
						<td class="text-center">{{$user->email}}</td>
						<td class="text-center">{{$user->created_at->toFormattedDateString()}}</td>
						<td class="text-center"><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : ''}} name="role_admin"></td>
						<td class="text-center"><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : ''}} name="role_user"></td>
						<td class="text-center">
							<div class="button-group btn-group-xs" role="group">
								<a href="{{route('users.edit', $user->id)}}" class="btn btn-warning">Editar</a> {!! Form::open(array('route' => ['users.destroy', $user->id], 'method' => 'DELETE')) !!}
									{{Form::submit('Eliminar', array('class' => 'btn btn-danger', 'onclick' => 'deleteMessage()'))}}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	function deleteMessage(){
		msg = confirm('Desea eliminar al usuario seleccionado?');
		if(!msg){
			event.preventDefault();
			window.location.href;
		}
	}
</script>
@endsection