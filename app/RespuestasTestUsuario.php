<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestasTestUsuario extends Model
{
    protected $guarded = [];

    /**
     * Una encuesta puede tener muchas preguntas.
     */
    public function testRespuesta()
    {
        return $this->hasOne('App\Test');
    }
}
