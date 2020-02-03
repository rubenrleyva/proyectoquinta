<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'apellidos',
        'dni', 'domicilio', 'fechanacimiento',
        'telefono', 'localidad', 'codigopostal',
        'matricula', 'clasespracticas', 'tipousuario',
        'teorico', 'practico', 'id_foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Función que nos devuelve lo foto.
     * @return class Los datos de la foto del usuario.
     */
    public function foto()
    {
        return $this->hasOne('App\Foto', 'id', 'id_foto');
    }

    /**
     * Función que nos devuelve la clase.
     * @return class Los datos delpago del usuario.
     */
    public function pago()
    {
        return $this->hasMany('App\Pago', 'id_usuario', 'id');
    }


    /**
     * Función que nos devuelve la clase.
     * @return class Los datos de las clases prácticas del usuario.
    */
    public function clase()
    {
        return $this->hasMany('App\Clase', 'id_alumno', 'id');
    }

}
