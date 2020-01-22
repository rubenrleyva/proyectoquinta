<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\User;
use App\Foto;
use App\Test;
use Illuminate\Support\Arr;
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
        $servicios = Servicio::all();

        // Contamos el número de alumnos del sistema.
        $alumnos = User::all()->where('tipousuario', 2)->count();

        // Recogemos todos los valores de las fotos del sistema.
        $fotos = Foto::all();

        // Recogemos todos los valores de usuarios del sistema.
        $usuarios = User::all();

        // Contamos si existe algún comentario.
        $comentarios = User::all()->where('comentario' != null);

        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido', compact('servicios', 'usuarios', 'alumnos', 'fotos', 'comentarios'));
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
    public function servicios()
    {

        // Recogemos el valor de los permisos
        $servicios = Servicio::all();

        $servicios = $servicios->shuffle();

        $servicios->all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido', compact('servicios'));
    }

    /**
     * Función encargada de mostrar la página de inicio.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.inicio');
    }

    /**
     * Función encargada de mostrar la página de inicio.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuariotest()
    {

        $usuario = auth()->user();

        $tests = Test::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.usuario', compact(['usuario', $usuario],['tests', $tests]));
    }
}
