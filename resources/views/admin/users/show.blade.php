@extends('admin.template.main')
@section('title')
    {{trans('app.user_detail')}}
@endsection
@section('content')
    <a href="{{route('admin.users.index')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> {{trans('app.users_list')}} </a> <br><br>
    <hr>
    <ul class="list-group">
        <li class="list-group-item"><strong> {{trans('app.title_name')}}:</strong> {{$user -> name}}, {{trans('app.status_title')}}: 
            @if($user -> estatus=='inactivo')
                <span class="label label-danger">{{$user -> estatus}}</span>
            @else
                <span class="label label-success">{{$user -> estatus}}</span>
            @endif</li>
        <li class="list-group-item"><strong>{{trans('app.title_registered')}}:</strong> {{$user -> created_at}}</li>
        <li class="list-group-item"><strong>{{trans('app.email')}}:</strong> {{$user -> email}}</li>
        <li class="list-group-item"><strong>{{trans('app.type')}}:</strong> {{$user -> type}}</li>        
    </ul>
    @if($user->type == 'taller')
        <hr>
        <h4> {{trans('app.associated_workshop')}}</h4>
        @foreach($user -> locales as $taller)
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
        @endforeach
    @elseif($user->type == 'almacenista')
        @foreach($user -> locales as $almacen)
        <hr>
        <h4> {{trans('app.store_associated')}}</h4>
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
        @endforeach
    @endif

    @if($user -> created_at != $user -> updated_at)
        <div class="alert alert-warning" role="alert">
          {{trans('app.last_update')}}: <stron>{{$user -> updated_at }} </stron>
        </div>
    @endif
@endsection