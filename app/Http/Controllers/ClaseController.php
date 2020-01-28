<?php

namespace App\Http\Controllers;

use App\Clase;
use App\User;
use Illuminate\Http\Request;

/**
 * Clase Controlador encaregada de controlar las clases que realiza la autoescuela.
 * Versión 0.4 14/12/2019
 */
class ClaseController extends Controller
{
    /**
     * Función encargada de mostrar la lista de clases que existe en el sistema.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recogemos el valor de todas las clases del sistema.
        $clases = Clase::all();

        // Recogemos el valor de todos los usuarios del sistema.
        $usuarios = User::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.mostrarclases')->with('clases', $clases)->with('usuarios', $usuarios);
    }

    /**
     * Función encargada de mostrar la pantalla de creación de clases.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        // Recogemos el valor de todas las clases del sistema.
        $clases = Clase::all();

        // Recogemos el valor de los usuarios que no tienen aprobado el teórico.
        $usuario = User::find($id);

        // Revogemos el valor del profesor que se encuentra registrado en este momento.
        $profesor = auth()->user();

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.crearclase', compact('clases', 'usuario', 'profesor'));
    }

    /**
     * Función encargada de guardar una nueva clase en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Buscamos el alumno en la base de datos.
        $alumno = User::find($request['id']);

        // Comprobamos que son válidos los datos introducidos.
        $this->validate($request, [
            'comentarios' => ['required', 'string', 'max:255'],
            //'precio' => ['required'],
            //'precioiva' => ['required'],
        ]);

        // Contamos el número de clases que tiene el alumno.
        $numeroClases = Clase::all()->where('id_alumno', $request['alumno'])->count();

        // Si el número de clases es igual a null
        if($numeroClases == null){

            // número de clase será igual a 0
            $numeroClase = 0;

        // en caso contrario
        }else{

            // numero de clase es igual al número de clases que hay en el sistema.
            $numeroClase = $numeroClases;
        }

        // creamos la clase con los precios que nos pasan
        Clase::create([
            'clase_numero' => $numeroClase + 1,
            'id_alumno' => $request['id'],
            'profesor' => $request['profesor'],
            'comentarios' => $request['comentarios'],
        ]);

        // le restamos al bono una clase.
        $alumno->clasespracticas = $alumno->clasespracticas - 1;

        // actualizamos los datos del alumno.
        $alumno->update();

        // Retornamos a una vista pasándole un mensaje.
        return redirect()->route('admin.mostrarclases')->with('respuesta', 'La clase ha sido creada.');
    }

    /**
     * Función encargada de mostrar una clase
     * en particular.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        //
    }

    /**
     * Función  que muestra la pantalla de creación de
     * edición de clases.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        //
    }

    /**
     * Función encargada de actualizar una clase.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
        //
    }

    /**
     * Función encargada de eliminar una clase del sistema.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        //
    }
}
