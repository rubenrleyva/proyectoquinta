<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $guarded = [];

    /**
     * Función que nos devuelve el usuario
     * @return class Los datos de las clases prácticas del usuario.
     */
    public function usuarioAlumno()
    {
        return $this->belongsTo('App\User', 'id_alumno');
    }

    /**
     * Función que nos devuelve el usuario
     * @return class Los datos de las clases prácticas del usuario.
     */
    public function usuarioProfesor()
    {
        return $this->belongsTo('App\User', 'id_profesor');
    }
}
