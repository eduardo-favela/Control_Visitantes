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

                <input type="text" class="form-control" name="placa" id="plca" placeholder="N° de Placa">
                <br>
                <input type="text" class="form-control" name="apellido_visitante" id="apellido" placeholder="Apellido del visitante">
                <br>
                <select name="marca_auto" id="marca" class="form-control">
                    <option value="0">Seleccionar automóvil:</option>
                    <option value="Audi">Audi</option>
                    <option value="BMW">BMW</option>
                    <option value="Ford">Ford</option>
                    <option value="Honda">Honda</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Jaguar">Jaguar</option>
                    <option value="Land Rover">Land Rover</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Mini">Mini</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Volvo">Volvo</option>
                    <option value="Dodge">Dodge</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Ferrari">Ferrari</option>
                </select>
                {{--<input type="text" class="form-control" name="marca_auto" id="marca" placeholder="Marca de auto">--}}
            </div>
            <div class="col-md-3 form-group">
                <br>
                <input type="text" class="form-control" name="nombre_visitante" id="nombre" placeholder="Nombre del visitante">
                <br>
                <input type="text" class="form-control" name="color_auto" id="color"  placeholder="Color de auto">
            </div>
            <div class="col-md-4 offset-1 form-group">
                <br>
                <input type="text" class="form-control" name="nombre_colono" id="nombre_colono" placeholder="Nombre del colono">
                <br>
                <input type="text" class="form-control" name="apellido_colono" id="apellido_colono" placeholder="Apellido del colono">
                <br>
                <input type="text" class="form-control" name="calle_colono" id="calle_colono" placeholder="Calle">
                <br>
                <input type="text" class="form-control" name="nocasa" id="nocasa" placeholder="Número de casa">
                <br>
                {{--<h3>{{$ultimavisita}}</h3>--}}
            </div>
            <div class="col-md-4 offset-4">
                <br>
                @if(Session::has('flash_message'))
                    <div class="alert alert-danger" role="alert">
                        <p>{{Session::get('flash_message')}}</p>
                    </div>
                @endif
                <button class="btn btn-primary form-control" type="submit">Registrar</button>
            </div>
        </div>
    </form>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            var options = {
                url: "placas",

                getValue: "placa",

                list: {
                    showAnimation: {
                        type: "fade", //normal|slide|fade
                        time: 400,
                        callback: function () {
                        }
                    },
                    hideAnimation: {
                        type: "slide", //normal|slide|fade
                        time: 400,
                        callback: function () {
                        }
                    },
                    onChooseEvent: function () {
                        var token = $("input[name=_token]").val();
                        $.ajax({
                            url: "placasfiltradas",
                            data: {placa: $("input[name=placa]").val(), _token: token},
                            type: "post",
                            dataType: 'json',
                            success: function (response) {
                                var nombre=$("#nombre");
                                var marca=$("#marca");
                                var color=$("#color");
                                var apellido=$("#apellido");
                                nombre.val(response.nombre);
                                marca.val(response.marca_auto);
                                color.val(response.color_auto);
                                apellido.val(response.apellido);
                            }
                        });

                        $.ajax({
                            url: "ultimovisitado",
                            data: {placa: $("input[name=placa]").val(), _token: token},
                            type: "post",
                            dataType: 'json',
                            success: function (response) {
                                var nombre=$("#nombre_colono");
                                var apellido=$("#apellido_colono");
                                var calle=$("#calle_colono");
                                var nocasa=$("#nocasa");
                                nombre.val(response[0].nombre);
                                apellido.val(response[0].apellido);
                                calle.val(response[0].calle);
                                nocasa.val(response[0].nocasa);
                            }
                        });
                    },
                    match: {
                        enabled: true
                    }
                },
                // theme:"round"
            };
            $("#plca").easyAutocomplete(options);


            var options2={

                url:"colonos",

                getValue: "nombre",

                list: {
                    showAnimation: {
                        type: "fade", //normal|slide|fade
                        time: 400,
                        callback: function () {
                        }
                    },
                    hideAnimation: {
                        type: "slide", //normal|slide|fade
                        time: 400,
                        callback: function () {
                        }
                    },
                    onChooseEvent: function () {
                        var token = $("input[name=_token]").val();
                        $.ajax({
                            url: "colonosfiltrados",
                            data: {nombre: $("input[name=nombre_colono]").val(), _token: token},
                            type: "post",
                            dataType: 'json',
                            success: function (response) {
                                var nombre=$("#nombre_colono");
                                var apellido=$("#apellido_colono");
                                var calle=$("#calle_colono");
                                var nocasa=$("#nocasa");
                                nombre.val(response[0].nombre);
                                apellido.val(response[0].apellido);
                                calle.val(response[0].calle);
                                nocasa.val(response[0].no_casa);
                            }
                        });
                    },
                    match: {
                        enabled: true
                    }
                },
            };
            $("#nombre_colono").easyAutocomplete(options2);
        });
    </script>
@endsection
