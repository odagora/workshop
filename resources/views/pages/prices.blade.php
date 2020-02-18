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
        </div>
        {!! Form::close() !!}
    </div>
@endsection