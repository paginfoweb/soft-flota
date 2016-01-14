@extends('admin.template.main')
@section('title')
    Almacenes
@endsection
@section('content')
    <a href="{{route('admin.almacenes.create')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear Almacen </a> <br><br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Almacen</th>
                <th><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Telefono</th>
                <th><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Estatus</th>
                <th><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Accion</th>
            </thead>
            @foreach($almacenes as $almacen)
                <tbody>
                    <tr>
                        <td> {{$almacen -> nombre}}</td>
                        <td> {{$almacen -> telefono}}</td>
                        <td>
                            @if($almacen -> estatus=='inactivo')
                                <span class="label label-danger">{{$almacen -> estatus}}</span>
                            @else
                                <span class="label label-success">{{$almacen -> estatus}}</span>
                            @endif                            
                        </td>
                        <td>
                            <a href="{{route('admin.almacenes.edit',$almacen -> id )}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            @if($almacen -> estatus=='inactivo')
                                <a href="{{route('admin.almacenes.active',$almacen -> id )}}" type="button" class="btn btn btn-success" onClick="return confirm('Desea continuar con la activacion?')"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                            @else
                                <a href="{{route('admin.almacenes.destroy',$almacen -> id )}}" type="button" class="btn btn-danger" onClick="return confirm('Desea continuar y eliminar?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            @endif
                             <a href="{{route('admin.almacenes.show',$almacen -> id )}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {!! $almacenes->render() !!} <!-- RENDERIZAMOS POR LAS NOTIFICACIONES FLAHS -->
    </div>


@endsection