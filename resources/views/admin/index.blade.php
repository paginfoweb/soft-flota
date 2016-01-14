@extends('admin.template.main_panel')
@section('title')
    Panel
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3 paneles">
            <div class="row text-center panel_category">
                <img src="{{asset('img/1.png')}}" alt="..." class="img-circle image-panel">
                <h4 class="text-uppercase panel_text">
                    Taquilla 
                    <br>
                    <small>
                        Cobros
                    </small>
                </h4>
            </div>
        </div>
        <div class="col-md-3 paneles">
            <div class="row text-center panel_category">
                <img src="{{asset('img/2.png')}}" alt="..." class="img-circle image-panel">
                <h4 class="text-uppercase panel_text">
                    Registrar 
                    <br>
                    <small>
                        Vehiculos
                    </small>
                </h4>
            </div>
        </div>
        <div class="col-md-3 paneles">
            <div class="row text-center panel_category">
                <img src="{{asset('img/3.png')}}" alt="..." class="img-circle image-panel">
                <h4 class="text-uppercase panel_text">
                    Registrar
                    <br>
                    <small>
                        Choferes
                    </small>
                </h4>
            </div>
        </div>
        <div class="col-md-3 paneles">
            <div class="row text-center panel_category">
                <img src="{{asset('img/4.png')}}" alt="..." class="img-circle image-panel">
                <h4 class="text-uppercase panel_text">
                    Registrar
                    <br>
                    <small>
                        Talleres
                    </small>
                </h4>
            </div>
        </div>
    </div>
@endsection