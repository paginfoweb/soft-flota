@extends('admin.template.main')
@section('title')
    {{trans('app.workshop_detail')}}
@endsection
@section('content')
    <a href="{{route('admin.talleres.index')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> {{trans('app.list_workshops')}} </a> <br><br>
    <hr>
    <ul class="list-group">
        <li class="list-group-item"><strong>{{trans('app.title_name')}} :</strong> {{$taller -> name}}</li>
        <li class="list-group-item"><strong>{{trans('app.created_title')}} :</strong> {{$taller -> created_at}}</li>
        <li class="list-group-item"><strong>{{trans('app.title_address')}} :</strong> {{$taller -> direccion}}</li>
        <li class="list-group-item"><strong>{{trans('app.phone_title')}} :</strong> {{$taller -> telefono}}</li>
        <li class="list-group-item"><strong>{{trans('app.contact_title')}} :</strong> {{$taller -> contacto}}</li>
        <li class="list-group-item"><strong>{{trans('app.status_title')}} :</strong>
            @if($taller -> estatus=='inactivo')
                <span class="label label-danger">{{$taller -> estatus}}</span>
            @else
                <span class="label label-success">{{$taller -> estatus}}</span>
            @endif
        </li>
    </ul>

    @if($taller -> created_at != $taller -> updated_at)
        <div class="alert alert-warning" role="alert">
          {{trans('app.last_update')}} {{$taller -> updated_at }} 
        </div>
    @endif
@endsection