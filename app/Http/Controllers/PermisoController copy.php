<?php

namespace App\Http\Controllers;

use App\Permiso;
use Illuminate\Http\Request;

/**
 * Clase Controlador encargada de controlar los permisos creados por autoescuela.
 * Versión 1 01/12/2019
 */
class PermisoController extends Controller
{
    /**
     * Función encargada de mostrar la lista de los permisos que existen en el sistema.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Recogemos el valor de todos los permisos del sistema.
        $permisos = Permiso::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.mostrarpermisos', compact('permisos'));

    }

    /**
     * Función encargada de mostrar la pantalla de creación de permisos.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.crearpermiso');

    }

    /**
     * Función encargada de guardar en la base de datos los nuevos permisos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validamos los datos
        $this->validate($request, [
            'tipopermiso' => ['required', 'string', 'max:100'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        // Si exite el texto 1
        if ($request['texto1']) {

            // lo validamos
            $this->validate($request, [
                'texto1' => ['required', 'string', 'max:255']
            ]);
        }

        // Si exite el texto 2
        if ($request['texto2']){

            // lo validamos
            $this->validate($request, [
                'texto2' => ['required', 'string', 'max:255'],
            ]);

        }

        // Si exite el texto 3
        if ($request['texto3']){

            // lo validamos
            $this->validate($request, [
                'texto3' => ['required', 'string', 'max:255'],
            ]);

        }

        // Si exite el texto 4
        if ($request['texto4']){

            // lo validamos
            $this->validate($request, [
                'texto4' => ['required', 'string', 'max:255'],
            ]);
        }

        // Si exite el texto 5
        if ($request['texto5']){

            // lo validamos
            $this->validate($request, [
                'texto5' => ['required', 'string', 'max:255'],
            ]);

        }

        // Si exite el texto 6
        if ($request['texto6']){

            // lo validamos
            $this->validate($request, [
                'texto6' => ['required', 'string', 'max:255'],
            ]);
        }

        // Si exite el texto 7
        if ($request['texto7']){

            // lo validamos
            $this->validate($request, [
                'texto7' => ['required', 'string', 'max:255'],
            ]);
        }

        // Validamos el resto de datos
        $this->validate($request, [
            'clases' => ['required'],
            'precio' => ['required'],
            'precioiva' => ['required'],
            'precioferta' => ['required'],
        ]);


        // Creamos el permiso con los datos que se aportan
        Permiso::create([
            'tipopermiso' => $request['tipopermiso'],
            'descripcion' => $request['descripcion'],
            'texto1' => $request['texto1'],
            'texto2' => $request['texto2'],
            'texto3' => $request['texto3'],
            'texto4' => $request['texto4'],
            'texto5' => $request['texto5'],
            'texto6' => $request['texto6'],
            'texto7' => $request['texto7'],
            'texto8' => $request['texto8'],
            'clases' => $request['clases'],
            'precio' => $request['precio'],
            'precioiva' => $request['precioiva'],
            'precioferta' => $request['precioferta'],
            'oferta' => $request['oferta'],
        ]);

        // Retornamos la vista con una respuesta.
        return redirect()->route('admin.mostrarpermisos')->with('respuesta', 'El permiso ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Función encargada de mostrar la pantalla de edición del permiso.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscamos el permiso a editar en el sistema.
        $permiso = Permiso::find($id);

        // Si no existe
        if(!$permiso){

            return redirect()->back()->with('respuesta', 'No existe el permiso.');
        }

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.crearpermiso', compact('permiso', $permiso));
    }

    /**
     * Función encargada de guardar en la base de datos el permiso editado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permiso  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Buscamos el permiso
        $permiso = Permiso::find($id);

        // si exite el permiso
        if ($permiso) {

            // validamos alguno de los datos.
            $this->validate($request, [
                'tipopermiso' => ['required', 'string', 'max:100'],
                'descripcion' => ['required', 'string', 'max:255'],
            ]);

            // los asignamos en la base de datos.
            $permiso->tipopermiso = $request['tipopermiso'];
            $permiso->descripcion = $request['descripcion'];

            // comprobamos si exite el texto 1
            if ($request['texto1']) {

                // lo validamos
                $this->validate($request, [
                    'texto1' => ['required', 'string', 'max:255']
                ]);

                // se lo asignamos
                $permiso->texto1 = $request['texto1'];
            }

            // comprobamos si exite el texto 2
            if ($request['texto2']){

                // lo validamos
                $this->validate($request, [
                    'texto2' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $permiso->texto2 = $request['texto2'];
            }

            // comprobamos si exite el texto 3
            if ($request['texto3']){

                // lo validamos
                $this->validate($request, [
                    'texto3' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $permiso->texto3 = $request['texto3'];
            }

            // comprobamos si exite el texto 4
            if ($request['texto4']){

                // lo validamos
                $this->validate($request, [
                    'texto4' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $permiso->texto4 = $request['texto4'];
            }

            // comprobamos si exite el texto 5
            if ($request['texto5']){

                // lo validamos
                $this->validate($request, [
                    'texto5' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $permiso->texto5 = $request['texto5'];
            }

            // comprobamos si exite el texto 6
            if ($request['texto6']){

                // lo validamos
                $this->validate($request, [
                    'texto6' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $permiso->texto6 = $request['texto6'];
            }

            // comprobamos si exite el texto 7
            if ($request['texto7']){

                // lo validamos
                $this->validate($request, [
                    'texto7' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $permiso->texto7 = $request['texto7'];
            }

            // comprobamos si exite el texto 8
            if ($request['texto8']){

                // lo validamos
                $this->validate($request, [
                    'texto8' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $permiso->texto8 = $request['texto8'];
            }

            // Comprobamos el resto de textos
            $this->validate($request, [
                'clases' => ['required'],
                'precio' => ['required'],
                'precioferta' => ['required'],
            ]);

            // Se asignan los valores en la base de datos
            $permiso->clases = $request['clases'];
            $permiso->precio = $request['precio'];
            $permiso->precioiva = $request['precioiva'];
            $permiso->precioferta = $request['precioferta'];
            $permiso->oferta = $request['oferta'];

            // Actualizamos el permiso
            $permiso->update();

        } else {

            // Retornamos a la ruta anterior con una respuesta
            return redirect()->back()->with('respuesta', 'No existe el permiso.');
        }

        // Retornamos una vista con una respuesta
        return redirect()->route('admin.mostrarpermisos')->with('respuesta', 'El permiso '.$request['tipopermiso'].' ha sido creado.');
    }

    /**
     * Función encargada de borrar el permiso del sistema.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permiso = Permiso::find($id);

        if(!$permiso){

        }

        $permiso->delete();

        return redirect()->route('admin.mostrarpermisos')->with('respuesta', 'El permiso ha sido borrado del sistema.');
    }
}
