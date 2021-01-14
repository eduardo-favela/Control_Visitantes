<!DOCTYPE html>
<html>
<head>
    <title>Control Visitantes</title>
    <link rel="stylesheet" type="text/css" href={{url(("/css/bootstrap.css"))}}>
    <link rel="stylesheet" type="text/css" href={{url(("/css/easy-autocomplete.css"))}}>
    <link rel="stylesheet" type="text/css" href={{url(("/css/easy-autocomplete.themes.css"))}}>

    @yield('cssextra')
    <style>
        .titulos{
            color:#ffffff;
            font-family: 'Malgun Gothic';
        }
        h1{
            color: #FFFFFF;
            font-family:'Malgun Gothic';
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #22292f">
            <div class="d-flex justify-content-between" style="width: 100%">
                <a class="navbar-brand titulos" href="inicio" style="color: #ffffff; font-size: 35px ">Inicio</a>
                <div>
                    <h1>Control</h1>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-md-2" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item">
                            <div style="margin-left: 410px;">
                                <h1>Control</h1>
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle titulos" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF; font-size: 35px;">
                                Menú
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- @if(Session::get('tipo')==1) --}}
                                <a class="dropdown-item" href={{url('registrarcolono')}}>Colonos</a>
                                <a class="dropdown-item" href={{url('visitantes')}}>Visitantes</a>
                                    <a class="dropdown-item" href={{url('visitas')}}>Visitas</a>
                                    {{-- <a class="dropdown-item" href="#">Usuarios</a> --}}
                                {{-- @endif --}}
                                <a class="nav-link btn btn-danger" href="/" style="color: #ffffff; font-size: 20px">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
@section('Contenido')

@show
<script src="{{url('/js/jquery-3.3.1.js')}}"></script>
<script src="{{url('/js/Popper.js')}}"></script>
<script src="{{url('/js/bootstrap.js')}}"></script>
<script src="{{url('/js/jquery.easy-autocomplete.js')}}"></script>
@yield('javascript')

</body>
</html>




{{--datos a registrar del colono:--}}
{{--nombre--}}
{{--direccion--}}

{{--datos a registrar de visitante:--}}
{{--placa--}}
{{--nombre--}}