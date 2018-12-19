<?php

namespace App\Http\Controllers;

use App\Visita;
use Illuminate\Http\Request;
use App\Colono;
use App\Visitante;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
    return view('inicio',compact('visitante'));
}
function getplacas(){
    $visitante=DB::table('visitantes')
        ->select(DB::raw("placa, concat(nombre,' ',apellido) as 'nombre', color_auto, marca_auto"))
        ->get();
    return $visitante;
}
function getplacasfiltradas(Request $request){
//        dd($request->placa);
        $placa=$request->get('placa');
        $visitante=Visitante::all()->where('placa','=',$placa);
//        dd($visitante);
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
        $visita=new Visita();
        $visita->fecha_hora=Carbon::now("America/Mexico_City")->toDateTimeString();
        $visita->id_colono=$request->input('nombre_colono');
        $visita->id_visitante=$request->input('placa');
        $visita->save();
        return back();
    }
}
