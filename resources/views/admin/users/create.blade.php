@extends('admin.template.main')
@section('title')
    Crear Usuario
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
    {!! Form::open(['route'=>'admin.users.store','method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre completo','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'angelb89@gmail.com','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Contraseña') !!}
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'********','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type','Tipo de Usuario') !!}
            {!! Form::select('type',['admin'=>'Administrador','cajero'=>'Cajero','almacenista'=>'Almacen','taller'=>'Taller','propietario'=>'Propietario'],null,['class'=>'form-control select_basic_create','placeholder'=>'Seleccione','required']) !!}
        </div>        
        <div class="form-group inten_oculto" id="taller_select_user">
            {!! Form::label('taller_id','Talleres') !!}
            {!! Form::select('taller_id',$talleres,null,['class'=>'form-control select_basic_create','placeholder'=>'Seleccione']) !!}
        </div>
        <div class="form-group inten_oculto" id="almacen_select_user">
            {!! Form::label('almacen_id','Almacen') !!}
            {!! Form::select('almacen_id',$almacenes,null,['class'=>'form-control select_basic_create','placeholder'=>'Seleccione']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Registrar',['class'=>'btn btn-primary','id'=>'crear_user']) !!}
        </div>
    {!! Form::close() !!}
@endsection
@section('js')
    
    <script src="{{asset('js/users/scritp.js')}}"></script>
@endsection