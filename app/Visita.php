<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table="visitas";
    protected $primaryKey="idvisita";
    public $timestamps=false;
    function visita(){
        return $this->belongsTo(Visitante::class,'placa','idvisita');
    }
    function visita_colono(){
        return $this->belongsTo(Colono::class,'idcolono','idvisita');
    }
}
