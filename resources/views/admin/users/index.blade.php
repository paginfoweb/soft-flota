@extends('admin.template.main')
@section('title')
    Usuarios
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
    
    <a href="{{route('admin.users.create')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear usuario </a>
    {!! Form::open(['route'=>'admin.users.index','method'=>'GET','class'=>'navbar-form navbar-right','id'=>'form_name_search']) !!}
        <div class="input-group">
            {!! Form::text('name',null,['id'=> 'name_search','class'=> 'form-control', 'placeholder' => 'Buscar Usuario','aria-describedby'=>'basic-addon2']) !!}
            <span class="input-group-addon" id="basic-addon2"><span  class = "glyphicon glyphicon-search"  aria-hidden = "true"> </span></span>
        </div>
    {!! Form::close() !!}
    <br>
    <br>

    <div class="table-responsive" id="result_search_name">
        <table class="table table-bordered">
            <thead>
                <th><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nombre</th>
                <th><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email</th>
                <th><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Tipo</th>
                <th><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Accion</th>
            </thead>
            @foreach($users as $user)
                <tbody >
                    <tr>                        
                        <td> {{$user -> name}}</td>
                        <td> {{$user -> email}}</td>
                        <td> {{$user -> type}}</td>
                        <td>
                            <a href="{{route('admin.users.edit',$user -> id )}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            @if($user -> estatus=='inactivo')
                                <a href="{{route('admin.users.active',$user -> id )}}" type="button" class="btn btn btn-success" onClick="return confirm('Desea continuar con la activacion?')"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                            @else
                                <a href="{{route('admin.users.destroy',$user -> id )}}" type="button" class="btn btn-danger" onClick="return confirm('Desea continuar y eliminar?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            @endif
                             <a href="{{route('admin.users.show',$user -> id )}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            @endforeach

            @if(count($users) < 1)
                <tbody>
                    <tr>                        
                        <td colspan="4"> <b>Lo sentimos no hay registros que coincidan con su busqueda</b></td>
                    </tr>
                </tbody>
            @endif
            
        </table>
        {!! $users->render() !!} <!-- RENDERIZAMOS POR LAS NOTIFICACIONES FLAHS -->
    </div>


@endsection
@section('js')
    
    <script src="{{asset('js/users/script.js')}}"></script>
@endsection