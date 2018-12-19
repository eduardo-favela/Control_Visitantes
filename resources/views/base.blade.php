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
    <a class="navbar-brand titulos" href="inicio" style="color: #ffffff; font-size: 35px ">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div style="margin-left: 500px">
                    <h1>Control</h1>
                </div>
            </li>
            <li class="nav-item dropdown" style=" margin-left: 310px">
                <a class="nav-link dropdown-toggle titulos" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF; font-size: 25px;">
                    Menú
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href={{url('registrarcolono')}}>Colonos</a>
                        <a class="dropdown-item" href={{url('visitas')}}>Visitas</a>
                        <a class="dropdown-item" href="#">Usuarios</a>
                </div>
            </li>
            {{--<li class="nav-item" style="margin-left: 40px">--}}
                    {{--<a class="nav-link btn btn-danger" href="#" style="color: #ffffff; font-size: 20px">Cerrar Sesión</a>--}}
            {{--</li>--}}
        </ul>
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