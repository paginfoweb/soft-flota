@extends('admin.template.main')
@section('title')
    {{trans('app.section_title_workshops')}}
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

    {!! Form::open(['route'=>'admin.talleres.index','method'=>'GET','class'=>'navbar-form navbar-right','id'=>'form_name_search']) !!}
        <div class="input-group">
            {!! Form::text('name',null,['id'=> 'name_search','class'=> 'form-control', 'placeholder' => trans('app.search_workshop'),'aria-describedby'=>'basic-addon2']) !!}
            <span class="input-group-addon" id="basic-addon2"><span  class = "glyphicon glyphicon-search"  aria-hidden = "true"> </span></span>
        </div>
    {!! Form::close() !!}
    <a href="{{route('admin.talleres.create')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {{trans('app.create_workshop_title')}} </a> 
    <br><br>

    <div class="table-responsive" id="result_search_name">
        <table class="table table-bordered">
            <thead>
                <th><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>{{trans('app.workshop_title')}}</th>
                <th><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> {{trans('app.phone_title')}}</th>
                <th><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> {{trans('app.status_title')}}</th>
                <th><span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{trans('app.action_title')}}</th>
            </thead>
            @foreach($talleres as $taller)
                <tbody>
                    <tr>
                        <td> {{$taller -> name}}</td>
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

            @if(count($talleres) < 1)
                <tbody>
                    <tr>                        
                        <td colspan="4"> <b>{{trans('app.search_not_found_message')}}</b></td>
                    </tr>
                </tbody>
            @endif

        </table>
        {!! $talleres->render() !!} <!-- RENDERIZAMOS POR LAS NOTIFICACIONES FLAHS -->
    </div>


@endsection
@section('js')
    <script src="{{asset('js/talleres/script.js')}}"></script>
@endsection()