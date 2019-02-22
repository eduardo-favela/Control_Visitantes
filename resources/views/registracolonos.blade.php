@extends('base')
@section('cssextra')
@endsection
@section('Contenido')
    <div class="row">
        <div class="col-md-4 offset-1">
            <br><br>
            <h1 style="text-align: center; color: #3d4852;">Colonos</h1>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th style="color: #3d4852;">Nombre</th>
                    <th style="color: #3d4852;">Dirección</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                @foreach ($colono as $item)
                    <tr>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->direccion}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4 offset-2">
            <br><br>
            <h1 style="text-align: center; color: #3d4852;">Registrar colono</h1>
            <hr>
            <form action="registrarcolonos" method="post">
                {{csrf_field()}}
                <br>
                <input type="text" name="nombre" onkeyup="mayuscula(this)" class="form-control" placeholder="Nombre">
                <br>
                <input type="text" name="calle" onkeyup="mayuscula(this)" class="form-control" placeholder="Calle">
                <br>
                <input type="text" name="ncasa" onkeyup="mayuscula(this)" class="form-control" placeholder="Número de casa" style="width: 150px">
                <br>
                <div align=center>
                    <button type="submit" class="btn btn-primary form-control" style="width:150px">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function mayuscula(campo){
            $(campo).keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });
        }
    </script>
@endsection