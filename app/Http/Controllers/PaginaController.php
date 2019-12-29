<?php

namespace App\Http\Controllers;

use App\Servicio;
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
        $servicios = Servicio::all();

        // Contamos el número de alumnos del sistema.
        $alumnos = User::all()->where('tipousuario', 2)->count();

        // Recogemos todos los valores de las fotos del sistema.
        $fotos = Foto::all();

        // Recogemos todos los valores de usuarios del sistema.
        $usuarios = User::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido', compact('servicios', 'usuarios', 'alumnos', 'fotos'));
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

        $basicos = Servicio::all()->where('tipo_servicio', 'Permisos básicos');
        $profesionales = Servicio::all()->where('tipo_servicio', 'Permisos profesionales');
        $cursos = Servicio::all()->where('tipo_servicio', 'Cursos');
        $titulaciones = Servicio::all()->where('tipo_servicio', 'Titulaciones');
        $bonos = Servicio::all()->where('tipo_servicio', 'Bonos');

        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido', compact('basicos', 'profesionales', 'cursos', 'titulaciones', 'bonos', 'servicios'));
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
}
