<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $table="visitantes";
    protected $primaryKey="placa";
    public $timestamps=false;
    function visitante_visita(){
        return $this->hasMany(Visita::class, 'idvisitante','placa');
    }
}
