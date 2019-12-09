<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaEncuesta extends Model
{
    protected $guarded = [];

    /**
     * Una encuesta puede tener muchas preguntas.
     */
    public function encuesta()
    {
        return $this->belongsTo('App\Encuesta', 'id_encuesta', 'id');
    }

    /**
     * Una encuesta puede tener muchas preguntas.
     */
    public function respuesta()
    {
        return $this->hasMany('App\RespuestaEncuestas', 'id_pregunta', 'id');
    }
}
