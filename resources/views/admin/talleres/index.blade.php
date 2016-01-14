@extends('admin.template.main')
@section('title')
    Talleres
@endsection
@section('content')
    <a href="{{route('admin.talleres.create')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear taller </a> <br><br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Taller</th>
                <th><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Telefono</th>
                <th><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Estatus</th>
                <th><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Accion</th>
            </thead>
            @foreach($talleres as $taller)
                <tbody>
                    <tr>
                        <td> {{$taller -> nombre}}</td>
                        <td> {{$taller -> telefono}}</td>
                        <td>
                            @if($taller -> estatus=='inactivo')
                                <span class="label label-danger">{{$taller -> estatus}}</span>
                            @else
                                <span class="label label-success">{{$taller -> estatus}}</span>
                            @endif                            
                        </td>
                        <td>
                            <a href="{{route('admin.talleres.edit',$taller -> id )}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            @if($taller -> estatus=='inactivo')
                                <a href="{{route('admin.talleres.active',$taller -> id )}}" type="button" class="btn btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                            @else
                                <a href="{{route('admin.talleres.destroy',$taller -> id )}}" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            @endif
                            <a href="{{route('admin.talleres.show',$taller -> id )}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {!! $talleres->render() !!} <!-- RENDERIZAMOS POR LAS NOTIFICACIONES FLAHS -->
    </div>


@endsection