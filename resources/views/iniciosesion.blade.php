<!DOCTYPE html>
<html>
<head>
    <title>Control Visitantes</title>
    <link rel="stylesheet" type="text/css" href={{url(("/css/bootstrap.css"))}}>
</head>
<style>
    .titulo{
    text-align: center;
        background-color: #22292f;
        padding: 20px;
        font-size: 45px;
        font-family: 'Malgun Gothic';
        color: #ffffff
    }
    .iniciosesion{
        text-align: center;
        color: #3d4852;
        font-size: 35px;
        font-family: 'Malgun Gothic';
    }
</style>
<body>
{{--<div class="row">--}}
{{--<div class="col-md-12 col-sm-12">--}}
    <header class="titulo">Control de visitantes</header>
{{--</div>
</div>--}}
<div class="row form-group" style="margin-top: 100px">
    <div class="col-md-4 col-sm-4 offset-4 form-control">
        <h2 class="iniciosesion" style="color: #3d4852;">Inicie sesión</h2>
        <br>
        <form action="iniciarsesion" method="post">
            {{csrf_field()}}
            <input class="form-control" type="text" placeholder="Usuario" name="usuario">
        <br>
        <input class="form-control" type="password" placeholder="Contraseña" name="password">
            <br>
            @if(Session::has('flash_message'))
                <div class="alert alert-danger" role="alert">
                    <p>{{Session::get('flash_message')}}</p>
                </div>
            @endif
        <br>
        <button class="btn btn-primary form-control" type="submit">Ingresar</button>
        <br>
        <br>
        </form>
    </div>
</div>
<script src="{{url('/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('/js/Popper.js')}}"></script>
<script src="{{url('/js/bootstrap.js')}}"></script>
</body>
</html>