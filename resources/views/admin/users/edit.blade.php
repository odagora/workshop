@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario</div>

                <div class="panel-body">
                    {!! Form::open(['class' => 'form-horizontal', 'route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', 'Nombre', array('class' => 'col-md-4 control-label'))}}
                            <div class="col-md-6">
                                {{ Form::text('name', $user->name, array('class' => 'form-control', 'required' => 'required'))}}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', 'E-Mail', array('class' => 'col-md-4 control-label'))}}
                            <div class="col-md-6">
                                {{ Form::email('email', $user->email, array('class' => 'form-control', 'required' => 'required'))}}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('roles', null, array('class' => 'col-md-4 control-label'))}}
                            <div class="col-md-6 roles-options">
                                <div class="col-md-12 option">
                                   <input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : ''}} name="role_admin"><span>Administrador</span> 
                                </div>
                                 <div class="col-md-12 option">
                                     <input type="checkbox" {{ $user->hasRole('User') ? 'checked' : ''}} name="role_user"><span>Usuario</span>
                                 </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', null, array('class' => 'col-md-4 control-label'))}}
                            <div class="col-md-6 password-options">
                                <div class="col-md-12 option">
                                    {{Form::radio('pass', 'keep', false, ['id' => 'keep', 'onclick' => 'manualPassword()', 'checked' => 'default'])}}<span>No cambiar password</span>
                                </div>
                                <div class="col-md-12 option">
                                    {{Form::radio('pass', 'auto', false, ['id' => 'auto', 'onclick' => 'manualPassword()'])}}<span>Auto generar password</span>    
                                </div>
                                <div class="col-md-12 option">
                                    {{Form::radio('pass', 'manual', false, ['id' => 'manual', 'onclick' => 'manualPassword()'])}}<span>Cambiar password manualmente</span>
                                    {{ Form::text('password', '', array('class' => 'form-control', 'id' => 'manual-password', 'placeholder' => 'Asignar un password manualmente a este usuario'))}}
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar usuario
                                </button>
                            {!! Html::linkRoute('users.index', 'Cancelar', null , array('class' => 'btn btn-danger')) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    function manualPassword(){
        if(document.getElementById("manual").checked){
            document.getElementById("manual-password").style.display= 'inline-block';
        }
        else{
            document.getElementById("manual-password").style.display= 'none';
        }
    }
</script>
@endsection
