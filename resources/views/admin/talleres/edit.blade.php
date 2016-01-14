@extends('admin.template.main')
@section('title')
    Editar Taller
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
    {!! Form::open(['route'=>['admin.talleres.update',$taller->id],'method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',$taller->nombre,['class'=>'form-control','placeholder'=>'Nombre completo','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('direccion','Dirección') !!}
            {!! Form::text('direccion',$taller->direccion,['class'=>'form-control','placeholder'=>'Direccion ','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono','Teléfono') !!}
            {!! Form::text('telefono',$taller->telefono,['class'=>'form-control','placeholder'=>'Telefono de contacto','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contacto','Contácto') !!}
            {!! Form::text('contacto',$taller->contacto,['class'=>'form-control','placeholder'=>'Nombre del encargado','required']) !!}
        </div>                  
        <div class="form-group">
            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.talleres.index')}}" type="button" class="btn btn-danger">Cancelar</a>
        </div>
    {!! Form::close() !!}
@endsection
@section('js')
    <script>
        $(".chosen-select-basico-edit").chosen();        
    </script>
@endsection