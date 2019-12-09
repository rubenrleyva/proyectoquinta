<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $fillable = [
        'titulo',
        'uuid'
    ];

    /**
     * Una encuesta puede tener muchas preguntas.
     */
    public function preguntasEncuestas()
    {
        return $this->hasMany('App\PreguntaEncuesta', 'id_encuesta');
    }
}
