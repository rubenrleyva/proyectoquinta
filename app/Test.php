<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded = [];

    /**
     * Una encuesta puede tener muchas preguntas.
     */
    public function preguntasTests()
    {
        return $this->hasMany('App\PreguntaTest', 'id_test');
    }

    
}
