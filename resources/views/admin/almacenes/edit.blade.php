@extends('admin.template.main')
@section('title')
    Editar Almacen
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
    {!! Form::open(['route'=>['admin.almacenes.update',$almacen->id],'method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',$almacen->nombre,['class'=>'form-control','placeholder'=>'Nombre completo','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('direccion','Dirección') !!}
             {!! Form::text('direccion',$almacen->direccion,['class'=>'form-control','placeholder'=>'Direccion ','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono','Teléfono') !!}
            {!! Form::text('telefono',$almacen->telefono,['class'=>'form-control','placeholder'=>'Telefono de contacto','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contacto','Contácto') !!}
            {!! Form::text('contacto',$almacen->contacto,['class'=>'form-control','placeholder'=>'Nombre del encargado','required']) !!}
        </div>        
        <div class="form-group">
            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.almacenes.index')}}" type="button" class="btn btn-danger">Cancelar</a>
        </div>
    {!! Form::close() !!}
@endsection