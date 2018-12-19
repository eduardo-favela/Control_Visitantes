@extends('base')
@section('cssextra')
@endsection
@section('Contenido')
    <div class="row">
        <div class="col-md-6 offset-3">
            <br><br>
            <h1 style="color: #3d4852; text-align: center">Visitas</h1>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th style="color: #3d4852;">Fecha y hora</th>
                    <th style="color: #3d4852;">Nombre del colono</th>
                    <th style="color: #3d4852;">Nombre del visitante</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                @foreach ($visita as $item)
                    <tr>
                        <td>{{$item->fecha_hora}}</td>
                        <td>{{$item->nombre_colono}}</td>
                        <td>{{$item->nombre_visitante}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('javascript')
@endsection