<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaEncuestas extends Model
{
    protected $guarded = [];

    /**
     * Una encuesta puede tener muchas preguntas.
     */
    public function pregunta()
    {
        return $this->hasOne('App\PreguntaEncuesta');
    }
}
