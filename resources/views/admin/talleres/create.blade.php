@extends('admin.template.main')
@section('title')
    Crear Taller
@endsection
@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route'=>'admin.talleres.store','method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre completo','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('direccion','Dirección') !!}
             {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Direccion ','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono','Teléfono') !!}
            {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Telefono de contacto','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contacto','Contácto') !!}
            {!! Form::text('contacto',null,['class'=>'form-control','placeholder'=>'Nombre del encargado','required']) !!}
        </div>        
        <div class="form-group">
            {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.talleres.index')}}" type="button" class="btn btn-danger">Cancelar</a>
        </div>
    {!! Form::close() !!}
@endsection