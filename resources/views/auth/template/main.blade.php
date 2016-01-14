<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Bienvenido | Login </title>
    <link rel="stylesheet"  href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet"  href="{{asset('css/stylelogin.css')}}">
    <script src="{{asset('plugins/jquery/jquery.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
</head>
<body>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">@yield('title','')</h3>
    </div>
    <div class="panel-body">
        @include('flash::message')
        @yield('content','contenido')
    </div>
    <div class="panel-footer">@include('admin.template.partials.footer')</div>
</div>

</body>
</html>