<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colono extends Model
{
    protected $table="colonos";
    protected $primaryKey="idcolono";
    public $timestamps=false;
    function visita_colono(){
        return $this->hasMany(Visita::class,'idvisita','idcolono');
    }
}
