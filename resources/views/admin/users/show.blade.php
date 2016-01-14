@extends('admin.template.main')
@section('title')
    Detalle Usuario
@endsection
@section('content')
    <a href="{{route('admin.users.index')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Listar Usuarios </a> <br><br>
    <hr>
    <ul class="list-group">
        <li class="list-group-item"><strong> Nombre:</strong> {{$user -> name}}, estatus: 
            @if($user -> estatus=='inactivo')
                <span class="label label-danger">{{$user -> estatus}}</span>
            @else
                <span class="label label-success">{{$user -> estatus}}</span>
            @endif</li>
        <li class="list-group-item"><strong>Registrado:</strong> {{$user -> created_at}}</li>
        <li class="list-group-item"><strong>Email:</strong> {{$user -> email}}</li>
        <li class="list-group-item"><strong>Tipo:</strong> {{$user -> type}}</li>        
    </ul>
    @if($user->type == 'taller')
        <hr>
        <h4> Taller asociado</h4>
        @foreach($user -> locales as $taller)
            <ul class="list-group">
                <li class="list-group-item"><strong>Nombre:</strong> {{$taller -> nombre}}</li>
                <li class="list-group-item"><strong>Creado:</strong> {{$taller -> created_at}}</li>
                <li class="list-group-item"><strong>Dirección:</strong> {{$taller -> direccion}}</li>
                <li class="list-group-item"><strong>Teléfono:</strong> {{$taller -> telefono}}</li>
                <li class="list-group-item"><strong>Contácto:</strong> {{$taller -> contacto}}</li>
                <li class="list-group-item"><strong>Estatus:</strong>
                    @if($taller -> estatus=='inactivo')
                        <span class="label label-danger">{{$taller -> estatus}}</span>
                    @else
                        <span class="label label-success">{{$taller -> estatus}}</span>
                    @endif
                </li>
            </ul>
        @endforeach
    @elseif($user->type == 'almacenista')
        @foreach($user -> locales as $almacen)
        <hr>
        <h4> Almacen asociado</h4>
        <ul class="list-group">
            <li class="list-group-item"><strong>Nombre:</strong> {{$almacen -> nombre}}</li>
            <li class="list-group-item"><strong>Creado:</strong> {{$almacen -> created_at}}</li>
            <li class="list-group-item"><strong>Dirección:</strong> {{$almacen -> direccion}}</li>
            <li class="list-group-item"><strong>Teléfono:</strong> {{$almacen -> telefono}}</li>
            <li class="list-group-item"><strong>Contácto:</strong> {{$almacen -> contacto}}</li>
            <li class="list-group-item"><strong>Estatus:</strong> 
                @if($almacen -> estatus=='inactivo')
                    <span class="label label-danger">{{$almacen -> estatus}}</span>
                @else
                    <span class="label label-success">{{$almacen -> estatus}}</span>
                @endif
            </li>
        </ul>
        @endforeach
    @endif

    @if($user -> created_at != $user -> updated_at)
        <div class="alert alert-warning" role="alert">
          Última actualización de datos del user: <stron>{{$user -> updated_at }} </stron>
        </div>
    @endif
@endsection