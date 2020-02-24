@extends('main')
@section('title', '| Precios Operaciones de Mecánica')
@section('content')
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2">
            <h1 class="text-center">Precios Operaciones de Mecánica</h1>
            <hr>
            {!! Form::open(array('name' => 'price_form', 'class' => 'form-horizontal', 'id' => 'price_form', 'onsubmit' => 'return false')) !!}
            <div class="form-group">
                {{ Form::label('make', 'Marca:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'control-label']])}}
                <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    <select name="make" id="make" class="form-control">
                        @foreach ($makes as $make)
                            <option value="{{ $make->id }}">{{ $make->name }}</option>
                        @endforeach
                    </select>         
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Línea:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'control-label']])}}
                <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Modelo:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'model-field', 'control-label']])}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Preventivo:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'ops-field', 'control-label']])}}
                <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Escáner:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'ops-field', 'control-label']])}}
                <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Precio:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'control-label']])}}
                <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Correctivo:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'ops-field', 'control-label']])}}
                <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <hr>
            <div class="form-group">
                {{ Form::label('type', 'Convenio:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'ops-field', 'control-label']])}}
                <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Repuestos:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'ops-field', 'control-label']])}}
                <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <hr>
            <div class="form-group">
                {{ Form::label('type', 'Operación:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'ops-field', 'control-label']])}}
                <div class="col-xs-7 col-sm-5 col-md-5 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Suspensión:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'ops-field', 'control-label']])}}
                <div class="col-xs-7 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Motor:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'control-label']])}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Transmisión:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'ops-field', 'control-label']])}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Frenos:', ['class' => ['col-xs-1', 'col-sm-1','col-md-1', 'control-label']])}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 gen-field">
                    {{ Form::select('type', [''],null,  array('class' => 'form-control'))}}
                </div>
            </div>
            <hr>
        </div>
        {!! Form::close() !!}
    </div>
@endsection