@extends('auth.template.main')
@section('title')
    <h1 class="text-uppercase">Sistema de administración de flotas</h1>
    <h4 class="text-uppercase">Login</h4>
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

    {!! Form::open(['route'=>'auth.login','method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('email','Correo Electronico') !!}
            {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'ejemplo@gmail.com','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Contraseña') !!}
            {!! Form::password('password',['class' => 'form-control', 'placeholder' => '*********', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Logearse',['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close()!!}
@endsection

