<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>@yield('title','Invitado') | Panel Administracion</title>
        <link rel="stylesheet"  href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet"  href="{{asset('css/style.css')}}">
        <link rel="stylesheet"  href="{{asset('plugins/chosen/chosen.css')}}">
        <link rel="stylesheet"  href="{{asset('plugins/trumbowyg/dist/ui/trumbowyg.min.css')}}">
    </head>
    <body>
        @include('admin.template.partials.navs')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-uppercase">@yield('title','')</h3>
            </div>
            <div class="panel-body">
                @include('flash::message')
                @yield('content','contenido')
            </div>
            <div class="panel-footer">@include('admin.template.partials.footer')</div>
        </div>
        <script src="{{asset('plugins/jquery/jquery.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
        <script src="{{asset('plugins/trumbowyg/dist/trumbowyg.min.js')}}"></script>
        @yield('js')
    </body>
</html>