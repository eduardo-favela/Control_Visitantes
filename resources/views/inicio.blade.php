@extends('base')
@section('cssextra')
    <style>
        .espaciador{
            margin-left: 10px;
        }
    </style>
@endsection
@section('Contenido')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <br>
            <h1 style="text-align:center; color: #3d4852;">Registrar visita</h1>
            <hr>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-4 offset-1">
            <h3 style="text-align:center; color: #3d4852;">Información del visitante</h3>
            <hr>
        </div>
        <div class="col-md-4 offset-2">
            <h3 style="text-align:center; color: #3d4852;">Información del colono</h3>
            <hr>
        </div>
    </div>
    <form action="registrarvisitas" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-3 espaciador">
                <br>
                <input type="text" class="form-control" name="placa" placeholder="N° de Placa">
                <br>
                <input type="text" class="form-control" name="apellido_visitante" placeholder="Apellido del visitante">
                <br>
                <input type="text" class="form-control" name="marca_auto" placeholder="Marca de auto">
            </div>
            <div class="col-md-3 form-group">
                <br>
                <input type="text" class="form-control" name="nombre_visitante" placeholder="Nombre del visitante">
                <br>
                <input type="text" class="form-control" name="color_auto"  placeholder="Color de auto">
            </div>
            <div class="col-md-4 offset-1 form-group">
                <br>
                <input type="text" class="form-control" name="nombre_colono" placeholder="Nombre del colono">
                <br>
                <h5 style="text-align:center; color: #3d4852;"></h5>
            </div>
            <div class="col-md-4 offset-4">
                <br><br><br>
                <button class="btn btn-primary form-control" type="submit">Registrar</button>
            </div>
        </div>
    </form>
    {{--<div class="row">--}}
    {{--<div class="col-md-6">--}}
    {{--<table class="table">--}}
    {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th style="color: #3d4852;">Número de placa</th>--}}
                    {{--<th style="color: #3d4852;">Nombre</th>--}}
                    {{--<th style="color: #3d4852;">Color de automóvil</th>--}}
                    {{--<th style="color: #3d4852;">Marca de automóvil</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--<br><br>--}}
                {{--@foreach ($visitante as $item)--}}
                    {{--<tr>--}}
                        {{--<td>{{$item->placa}}</td>--}}
                        {{--<td>{{$item->nombre}}</td>--}}
                        {{--<td>{{$item->color_auto}}</td>--}}
                        {{--<td>{{$item->marca_auto}}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 offset-1">--}}
            {{--<br>--}}
            {{--<h1 style="text-align: center; color: #3d4852;">Registrar visitante</h1>--}}
            {{--<form action="registrarvisitantes" method="post">--}}
                {{--{{csrf_field()}}--}}
                {{--<br>--}}
                {{--<input type="text" name="placa" class="form-control" placeholder="N° Placa">--}}
                {{--<br>--}}
                {{--<input type="text" name="nombre" class="form-control" placeholder="Nombre">--}}
                {{--<br>--}}
                {{--<input type="text" name="apellido" class="form-control" placeholder="Apellido">--}}
                {{--<br>--}}
                {{--<input type="text" name="color" class="form-control" placeholder="Color de automóvil">--}}
                {{--<br>--}}
                {{--<input type="text" name="marca" class="form-control" placeholder="Marca de automóvil">--}}
                {{--<br>--}}
                {{--<div align=center>--}}
                    {{--<button type="submit" class="btn btn-primary form-control" style="width:150px">Registrar</button>--}}
                {{--</div>--}}
                {{--<br><br>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
@section('javascript')
    @endsection