<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\User;
use App\Foto;
use Illuminate\Http\Request;

/**
 * Clase Controlador encargada de controlar las páginas del sitio.
 * Versión 1 01/12/2019
 */
class PaginaController extends Controller
{
    /**
     * Función encargada de mostrar la página principal del sitio web.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recogemos todos los valores de los permisos del sistema.
        $permisos = Permiso::all();

        // Contamos el número de profesores del sistema.
        $profesores = User::all()->where('tipousuario', 1)->count();

        // Contamos el número de alumnos del sistema.
        $alumnos = User::all()->where('tipousuario', 2)->count();

        // Recogemos todos los valores de las fotos del sistema.
        $fotos = Foto::all();

        // Recogemos todos los valores de usuarios del sistema.
        $usuarios = User::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido', compact('permisos', 'usuarios', 'profesores', 'alumnos', 'fotos'));
    }

    /**
     * Función encargada de mostrar la página de contacto del sitio web.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacto()
    {
        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido');
    }

    /**
     * Función encargada de mostrar la página de contacto del sitio web.
     *
     * @return \Illuminate\Http\Response
     */
    public function permisos()
    {

        // Recogemos el valor de los permisos
        $permisos = Permiso::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido', compact('permisos'));
    }
}
