@extends('admin.template.main')
@section('title')
    Detalle taller
@endsection
@section('content')
    <a href="{{route('admin.talleres.index')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Listar Talleres </a> <br><br>
    <hr>
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

    @if($taller -> created_at != $taller -> updated_at)
        <div class="alert alert-warning" role="alert">
          Última actualización de datos del taller: {{$taller -> updated_at }} 
        </div>
    @endif
@endsection