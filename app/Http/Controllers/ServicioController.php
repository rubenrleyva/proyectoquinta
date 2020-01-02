<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;

/**
 * Clase Controlador encargada de controlar los formación creados por autoescuela.
 * Versión 1 01/12/2019
 */
class ServicioController extends Controller
{
    /**
     * Función encargada de mostrar la lista de los formación que existen en el sistema.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Recogemos el valor de todos los formación del sistema.
        $servicios = Servicio::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.mostrarservicios', compact('servicios'));

    }

    /**
     * Función encargada de mostrar la pantalla de creación de formación.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.crearservicio');

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
            'tiposervicio' => ['required', 'string', 'max:100'],
            'nombre' => ['required'],
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
            //'precioferta' => ['required'],
        ]);


        // Creamos el permiso con los datos que se aportan
        Servicio::create([
            'tipo_servicio' => $request['tiposervicio'],
            'nombre_servicio' => $request['nombre'],
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
            //'precioferta' => $request['precioferta'],
            'oferta' => $request['oferta'],
        ]);

        // Retornamos la vista con una respuesta.
        return redirect()->route('admin.mostrarservicios')->with('respuesta', 'El servicio ha sido creada.');
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
     * @param  \App\Servicio  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscamos el permiso a editar en el sistema.
        $servicio = Servicio::find($id);

        // Si no existe
        if(!$servicio){

            return redirect()->back()->with('respuesta', 'No existe el servicio.');
        }

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.crearservicio', compact('servicio'));
    }

    /**
     * Función encargada de guardar en la base de datos la formación editado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Buscamos el permiso
        $servicio = Servicio::find($id);

        // si exite el permiso
        if ($servicio) {

            // validamos alguno de los datos.
            $this->validate($request, [
                'tiposervicio' => ['required', 'string', 'max:100'],
                'nombre' => ['required'],
                'descripcion' => ['required', 'string', 'max:255'],
            ]);

            // los asignamos en la base de datos.
            $servicio->tipo_servicio = $request['tiposervicio'];
            $servicio->nombre_servicio = $request['nombre'];
            $servicio->descripcion = $request['descripcion'];

            // comprobamos si exite el texto 1
            if ($request['texto1']) {

                // lo validamos
                $this->validate($request, [
                    'texto1' => ['required', 'string', 'max:255']
                ]);

                // se lo asignamos
                $servicio->texto1 = $request['texto1'];
            }

            // comprobamos si exite el texto 2
            if ($request['texto2']){

                // lo validamos
                $this->validate($request, [
                    'texto2' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $servicio->texto2 = $request['texto2'];
            }

            // comprobamos si exite el texto 3
            if ($request['texto3']){

                // lo validamos
                $this->validate($request, [
                    'texto3' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $servicio->texto3 = $request['texto3'];
            }

            // comprobamos si exite el texto 4
            if ($request['texto4']){

                // lo validamos
                $this->validate($request, [
                    'texto4' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $servicio->texto4 = $request['texto4'];
            }

            // comprobamos si exite el texto 5
            if ($request['texto5']){

                // lo validamos
                $this->validate($request, [
                    'texto5' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $servicio->texto5 = $request['texto5'];
            }

            // comprobamos si exite el texto 6
            if ($request['texto6']){

                // lo validamos
                $this->validate($request, [
                    'texto6' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $servicio->texto6 = $request['texto6'];
            }

            // comprobamos si exite el texto 7
            if ($request['texto7']){

                // lo validamos
                $this->validate($request, [
                    'texto7' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $servicio->texto7 = $request['texto7'];
            }

            // comprobamos si exite el texto 8
            if ($request['texto8']){

                // lo validamos
                $this->validate($request, [
                    'texto8' => ['required', 'string', 'max:255'],
                ]);

                // se lo asignamos
                $servicio->texto8 = $request['texto8'];
            }

            // Comprobamos el resto de textos
            $this->validate($request, [
                'clases' => ['required'],
                'precio' => ['required'],
                'precioferta' => ['required'],
            ]);

            // Se asignan los valores en la base de datos
            $servicio->clases = $request['clases'];
            $servicio->precio = $request['precio'];
            $servicio->precioiva = $request['precioiva'];
            //$servicio->precioferta = $request['precioferta'];
            $servicio->oferta = $request['oferta'];

            // Actualizamos el permiso
            $servicio->update();

        } else {

            // Retornamos a la ruta anterior con una respuesta
            return redirect()->back()->with('respuesta', 'El servicio no existe.');
        }

        // Retornamos una vista con una respuesta
        return redirect()->route('admin.mostrarservicios')->with('respuesta', 'El servicio ha sido creado.');
    }

    /**
     * Función encargada de borrar el permiso del sistema.
     *
     * @param  \App\Servicio  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);

        if(!$servicio){
            $respuesta = 'El servicio no existe en el sistema.';
        }else{
            $respuesta = 'El servicio ha sido borrada del sistema.';
            $servicio->delete();
        }

        return redirect()->route('admin.mostrarservicios')->with('respuesta', $respuesta);
    }
}
