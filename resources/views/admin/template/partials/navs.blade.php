<nav  class = "navbar navbar-default" > 
  <div  class= "container-fluid" > 
    <div  class= "navbar-header" > 
      <a  class= "navbar-brand"  href= "{{route('admin.index')}}" > 
        <img  class="img-responsive" alt= "Brand"  src= "{{asset('img/soft-taxi.png')}}" > 
      </a> 
    </div> 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="{{route('admin.index') }}">Inicio <span class="sr-only">(current)</span></a></li>
            </ul>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Choferes <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="">Listar</a></li>
                    <li><a href="">Registrar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-bed" aria-hidden="true"></span> Vehiculos <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="">Listar</a></li>
                    <li><a href="">Registrar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Configurar <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('admin.users.index')}}">Usarios</a></li>
                    <li><a href="{{route('admin.almacenes.index')}}">Almacenes</a></li>
                    <li><a href="">Feriados</a></li>
                    <li><a href="">Licencias</a></li>
                    <li><a href="">Tarifas</a></li>
                    <li><a href="">Marcas</a></li>
                    <li><a href="">Modelos</a></li>
                    <li><a href="">Provincias</a></li>
                    <li><a href="{{route('admin.talleres.index')}}">Talleres</a></li>
                </ul>
            </li>
            <ul class="nav navbar-nav">
                <li><a href="{{route('auth.logout')}}">Cerrar sesion</a></li>
            </ul>
        </ul>
    </div>
  </div> 
</nav>