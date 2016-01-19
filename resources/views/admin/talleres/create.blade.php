@extends('admin.template.main')
@section('title')
    {{trans('app.create_workshop_title')}}
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
    {!! Form::open(['route'=>'admin.talleres.store','method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('name',trans('app.title_name')) !!}
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>trans('app.complete_name'),'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('direccion',trans('app.title_address')) !!}
            {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>trans('app.title_address'),'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono',trans('app.phone_title')) !!}
            {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>trans('app.telephone_contact'),'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contacto',trans('app.contact_title')) !!}
            {!! Form::text('contacto',null,['class'=>'form-control','placeholder'=>trans('app.manager_name'),'required']) !!}
        </div>        
        <div class="form-group">
            {!! Form::submit(trans('app.title_record'),['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.talleres.index')}}" type="button" class="btn btn-danger">{{trans('app.title_cancel')}}</a>
        </div>
    {!! Form::close() !!}
@endsection