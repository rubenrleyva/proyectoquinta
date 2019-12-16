<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $guarded = [];

    /**
     * Función que nos devuelve los usuarios según el pago.
     * @return class Los datos de la foto del usuario.
     */
    public function usuario()
    {
        return $this->hasOne('App\User', 'id', 'id_usuario');
    }
}
