@extends('base')
@section('cssextra')
@endsection
@section('Contenido')
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th style="color: #3d4852;">Número de placa</th>
                    <th style="color: #3d4852;">Nombre</th>
                    <th style="color: #3d4852;">Color de automóvil</th>
                    <th style="color: #3d4852;">Marca de automóvil</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                @foreach ($visitante as $item)
                    <tr>
                        <td>{{$item->placa}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->color_auto}}</td>
                        <td>{{$item->marca_auto}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4 offset-1">
            <br><br>
            <h1 style="text-align: center; color: #3d4852;">Registrar visitante</h1>
            <form action="registrarvisitantes" method="post">
                {{csrf_field()}}
                <br>
                <input type="text" name="placa" class="form-control" placeholder="N° Placa">
                <br>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                <br>
                <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                <br>
                <input type="text" name="color" class="form-control" placeholder="Color de automóvil">
                <br>
                <input type="text" name="marca" class="form-control" placeholder="Marca de automóvil">
                <br>
                <div align=center>
                    <button type="submit" class="btn btn-primary form-control" style="width:150px">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection