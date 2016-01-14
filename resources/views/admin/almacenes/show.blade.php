@extends('admin.template.main')
@section('title')
    Detalle almacen
@endsection
@section('content')
    <a href="{{route('admin.almacenes.index')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Listar Almacen </a> <br><br>
    <hr>
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

    @if($almacen -> created_at != $almacen -> updated_at)
        <div class="alert alert-warning" role="alert">
          Última actualización de datos del almacen: {{$almacen -> updated_at }} 
        </div>
    @endif
@endsection