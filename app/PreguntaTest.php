<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaTest extends Model
{
    protected $guarded = [];

    /**
     * Una encuesta puede tener muchas preguntas.
     */
    public function test()
    {
        return $this->belongsTo('App\Test', 'id_test', 'id');
    }

    /**
     * Una encuesta puede tener muchas preguntas.
     */
    public function respuesta()
    {
        return $this->hasMany('App\RespuestaTest', 'id_pregunta', 'id');
    }

    /**
     * Función que nos devuelve lo foto.
     * @return class Los datos de la foto de la pregunta
     */
    public function foto()
    {
        return $this->hasOne('App\Foto', 'id', 'id_foto');
    }
}
