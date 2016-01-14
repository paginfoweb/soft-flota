@extends('admin.template.main')
@section('title')
    Actualizar datos Usuario
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
    {!! Form::open(['route'=>['admin.users.update',$user->id],'method'=>'PUT']) !!}
    <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',$user -> name,['class'=>'form-control','placeholder'=>'Nombre completo','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',$user -> email ,['class'=>'form-control','placeholder'=>'angelb89@gmail.com','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type','Tipo de Usuario') !!}
            {!! Form::select('type',['admin'=>'Administrador','cajero'=>'Cajero','almacenista'=>'Almacen','taller'=>'Taller','propietario'=>'Propietario'],$user -> type,['class'=>'form-control select_basic_create','placeholder'=>'Seleccione','required']) !!}
        </div>    
        @if($user->type=='taller')    
            <div class="form-group " id="taller_select_user">
                {!! Form::label('taller_id','Talleres') !!}
                {!! Form::select('taller_id[]',$talleres,$my_taller,['class'=>'form-control select_basic_create','placeholder'=>'Seleccione']) !!}
            </div>
            <div class="form-group inten_oculto" id="almacen_select_user">
                {!! Form::label('almacen_id','Almacen') !!}
                {!! Form::select('almacen_id[]',$almacenes,$my_almacen,['class'=>'form-control select_basic_create','placeholder'=>'Seleccione']) !!}
            </div>
        @elseif($user->type='almacenista')
            <div class="form-group inten_oculto" id="taller_select_user">
                {!! Form::label('taller_id','Talleres') !!}
                {!! Form::select('taller_id[]',$talleres,$my_taller,['class'=>'form-control select_basic_create','placeholder'=>'Seleccione']) !!}
            </div>
            <div class="form-group" id="almacen_select_user">
                {!! Form::label('almacen_id','Almacen') !!}
                {!! Form::select('almacen_id[]',$almacenes,$my_almacen,['class'=>'form-control select_basic_create','placeholder'=>'Seleccione']) !!}
            </div>
        @endif
        <div class="form-group">
            {!! Form::submit('Actualizar',['class'=>'btn btn-primary','id'=>'crear_user']) !!}
            <a href="{{route('admin.users.index')}}" type="button" class="btn btn-danger">Cancelar</a>
        </div>
    {!! Form::close() !!}
@endsection
@section('js')
    
    <script src="{{asset('js/users/scritp.js')}}"></script>
@endsection