@extends('admin.template.main')
@section('title')
    {{trans('app.detail_store')}}
@endsection
@section('content')
    <a href="{{route('admin.almacenes.index')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> {{trans('app.list_stores')}} </a> <br><br>
    <hr>
    <ul class="list-group">
        <li class="list-group-item"><strong>{{trans('app.title_name')}} :</strong> {{$almacen -> name}}</li>
        <li class="list-group-item"><strong>{{trans('app.created_title')}} :</strong> {{$almacen -> created_at}}</li>
        <li class="list-group-item"><strong>{{trans('app.title_address')}} :</strong> {{$almacen -> direccion}}</li>
        <li class="list-group-item"><strong>{{trans('app.phone_title')}} :</strong> {{$almacen -> telefono}}</li>
        <li class="list-group-item"><strong>{{trans('app.contact_title')}} :</strong> {{$almacen -> contacto}}</li>
        <li class="list-group-item"><strong>{{trans('app.status_title')}} :</strong> 
            @if($almacen -> estatus=='inactivo')
                <span class="label label-danger">{{$almacen -> estatus}}</span>
            @else
                <span class="label label-success">{{$almacen -> estatus}}</span>
            @endif
        </li>
    </ul>

    @if($almacen -> created_at != $almacen -> updated_at)
        <div class="alert alert-warning" role="alert">
          {{trans('app.last_update')}} {{$almacen -> updated_at }} 
        </div>
    @endif
@endsection