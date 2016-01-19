@extends('admin.template.main')
@section('title')
    {{trans('app.stores')}}
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

    {!! Form::open(['route'=>'admin.almacenes.index','method'=>'GET','class'=>'navbar-form navbar-right','id'=>'form_name_search']) !!}
        <div class="input-group">
            {!! Form::text('name',null,['id'=> 'name_search','class'=> 'form-control', 'placeholder' => trans('app.find_store'),'aria-describedby'=>'basic-addon2']) !!}
            <span class="input-group-addon" id="basic-addon2"><span  class = "glyphicon glyphicon-search"  aria-hidden = "true"> </span></span>
        </div>
    {!! Form::close() !!}
    <a href="{{route('admin.almacenes.create')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear Almacen </a> <br><br>
    <br>
    <br>

    <div class="table-responsive" id="result_search_name">
        <table class="table table-bordered">
            <thead>
                <th><span class="glyphicon glyphicon-home" aria-hidden="true"></span> {{trans('app.store')}}</th>
                <th><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> {{trans('app.phone_title')}}</th>
                <th><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> {{trans('app.status_title')}}</th>
                <th><span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{trans('app.action_title')}}</th>
            </thead>
            @foreach($almacenes as $almacen)
                <tbody>
                    <tr>
                        <td> {{$almacen -> name}}</td>
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

            @if(count($almacenes) < 1)
                <tbody>
                    <tr>                        
                        <td colspan="4"> <b>{{trans('app.search_not_found_message')}}</b></td>
                    </tr>
                </tbody>
            @endif

        </table>
        {!! $almacenes->render() !!} <!-- RENDERIZAMOS POR LAS NOTIFICACIONES FLAHS -->
    </div>


@endsection
@section('js')
    <script src="{{asset('js/almacenes/script.js')}}"></script>
@endsection