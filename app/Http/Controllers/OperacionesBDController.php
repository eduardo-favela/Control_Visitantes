<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Visita;
use Illuminate\Http\Request;
use App\Colono;
use App\Visitante;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class OperacionesBDController extends Controller
{
    function verhora(){
        $horaActual=Carbon::now("America/Mexico_City")->toDateTimeString();
        dd($horaActual);
    }
    function getvisitantes(){
    $visitante=DB::table('visitantes')
        ->select(DB::raw("placa, concat(nombre,' ',apellido) as 'nombre', color_auto, marca_auto"))
        ->get();
//        dd($visitante);
    return view('registrarvisitantes',compact('visitante'));
}
function inicio(){
        return view('inicio');
}
function getplacas(){
    $visitante=DB::table('visitantes')
        ->select(DB::raw("placa, concat(nombre,' ',apellido) as 'nombre', color_auto, marca_auto"))
        ->get();
    return $visitante;
}

    function getcolono(){
        $colono=DB::table('colonos')
            ->select(DB::raw("nombre, numero_casa, calle"))
            ->get();
        return $colono;
    }

function getplacasfiltradas(Request $request){
         $placa=$request->get('placa');
        $visitante=Visitante::where('placa','=',$placa)->first();
        return $visitante;
}
    function setvisitantes(Request $request){
        $visitante=new Visitante();
        $visitante->placa=$request->input("placa");
        $visitante->nombre=$request->input("nombre");
        $visitante->apellido=$request->input("apellido");
        $visitante->color_auto=$request->input("color");
        $visitante->marca_auto=$request->input("marca");
        $visitante->save();
        return back();
    }
    function getcolonos(){
        $colono=DB::table('colonos')->select(DB::raw("concat(nombre,' ',apellido) as 'nombre', concat(calle,' ',numero_casa) as 'direccion'"))->get();
//        dd($colono);
        return view('registracolonos',compact('colono'));
    }

    function getcolonosfiltrados(Request $request){
        $nombre=$request->get('nombre');
//        $apellido=$request->get('apellido_colono');
//        $nombrecortado= explode(" ",$nombre);
        $colono=DB::table('colonos')
            ->select(DB::raw("colonos.nombre as 'nombre', colonos.apellido as 'apellido', colonos.calle as 'calle', colonos.numero_casa as 'no_casa'"))
            ->where("colonos.nombre","=","$nombre")
            ->get();
//        dd($colono);
        return $colono;
    }
    function setcolonos(Request $request){
        $colono=new Colono();
        $colono->nombre=$request->input("nombre");
        $colono->apellido=$request->input("apellido");
        $colono->calle=$request->input("calle");
        $colono->numero_casa=$request->input("ncasa");
        $colono->save();
        return back();
    }
    function getvisitas(){
        $visita=DB::table('visitantes')
            ->join('visitas','visitas.id_visitante','=','visitantes.placa','inner')
            ->join('colonos','colonos.idcolono','=','visitas.id_colono','inner')
            ->select(DB::raw("visitas.fecha_hora as 'fecha_hora', concat(colonos.nombre,' ',colonos.apellido) as 'nombre_colono', concat(visitantes.nombre,' ',visitantes.apellido) as 'nombre_visitante'"))
            ->get();
//        dd($visita);
        return view('visitas',compact('visita'));
    }
    function setvisitas(Request $request){
        $placa=$request->get('placa');
        $visitante=Visitante::where('placa','=',$placa)->first();
         if ($request->input('placa')==null){
             return $this->setvisitas2($request);
        }
        else if ($visitante==null){
            $nuevovis=new Visitante();
            $nuevovis->placa=$request->input('placa');
            $nuevovis->nombre=$request->input('nombre_visitante');
            $nuevovis->apellido=$request->input('apellido_visitante');
            $nuevovis->color_auto=$request->input('color_auto');
            $nuevovis->marca_auto=$request->input('marca_auto');
            $nuevovis->save();
            return $this->setvisitas2($request);
        }
        else {
            return $this->setvisitas2($request);
        }

    }
    function setvisitas2($request){
        $nombredelcolono=$request->input('nombre_colono');
        $apellidocolono=$request->input('apellido_colono');
        $numerocasa=$request->input('nocasa');
        $calle=$request->input('calle_colono');
        if ($request->input('nombre_colono')==null||$request->input('nombre_visitante')==null){
            Session::flash('flash_message','Datos incompletos, se deben llenar los campos nuevamente.');
            return back();
        }
        else
        {
            $nombrecolono=DB::table('colonos')
                ->select(DB::raw("colonos.nombre as 'nombre', colonos.apellido as 'apellido', colonos.numero_casa as 'numero_casa', colonos.calle as 'calle', colonos.idcolono as 'idcolono'"))
                ->where("colonos.nombre","=", $nombredelcolono)
                ->where("colonos.apellido","=", $apellidocolono)
                ->where("colonos.numero_casa","=", $numerocasa)
                ->where("colonos.calle","=", $calle)
                ->first();
            if ($nombrecolono==null){
                Session::flash('flash_message','El Colono no está registrado');
                return back();
            }
            else{
                $idcolono=$nombrecolono->idcolono;
                return $this->setvisitas3($request,$idcolono);
            }
        }
    }
    function setvisitas3($request,$idcolono){
                $visita=new Visita();
                $visita->fecha_hora=Carbon::now("America/Mexico_City")->toDateTimeString();
                $visita->id_colono=$idcolono;
                $visita->id_visitante=$request->input('placa');
                $visita->save();
                return back();
    }
    function iniciarsesion(Request $request){
        $usuario=$request->get('usuario');
        $password=$request->get('password');
        $cons=Usuario::where('idusuario','=',$usuario)->where('pass','=',$password)->first();
//        dd($cons);
        if($cons!=null){
            Session::put('tipo',$cons->tipo);
            return redirect('/inicio');
        }
        else {
            Session::flash('flash_message','Usuario o contraseña incorrectos, intente nuevamente.');
            return back();
        }
    }
    function ultimovisitado(Request $request){
        $visitante=$request->get('placa');
        $ultimo=DB::table('visitas')->join('colonos','colonos.idcolono','=','visitas.id_colono','inner')
            ->join('visitantes','visitantes.placa','=','visitas.id_visitante')
            ->select(DB::raw('colonos.nombre as "nombre",colonos.apellido as "apellido", colonos.calle as "calle", colonos.numero_casa as "nocasa"'))
            ->where('visitas.id_visitante','=',$visitante)
            ->orderBy('visitas.idvisita','desc')
            ->limit(1)
            ->get();
//        dd($ultimo);
        return $ultimo;
    }
}