<?php

namespace App\Http\Controllers;

use App\Pago;
use App\User;
use App\Permiso;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Función encargada de mostrar la página de pagos del sitio web.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::all();
        $usuarios = User::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.mostrarpagos', compact('pagos', 'usuarios'));
    }

    /**
     * Función encargada de mostrar la pantalla de creación de pagos.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permisos = Permiso::all();
        $alumnos = User::all()->where('tipousuario', 2);

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.crearpago', compact('permisos', 'alumnos'));
    }

    /**
     * Función encargada de guardar un nuevo pago.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request);
        // Buscamos el alumno
        $alumno = User::find($request['alumno']);

        // Validamos algunos datos.
       $this->validate($request, [
            'concepto' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'string', 'max:255'],
            'precioiva' => ['required', 'string', 'max:255'],
        ]);

        if($request['pagado']){
            $pagado = 1;
        }else{
            $pagado = 0;
        }

        // Creamos un nuevo pago.
        Pago::create([
            'id_usuario' => $request['alumno'],
            'concepto' => $request['concepto'],
            'precioclases' => $request['preciopermiso'],
            'clases' => $request['numeroclases'],
            'precio' => $request['precio'],
            'precioiva' => $request['precioiva'],
            'pagado' => $pagado,
        ]);

        // Actualizamos las clases prácticas del alumno.
        $alumno->clasespracticas = $alumno->clasespracticas + $request['clases'];

        // Guardamos los cambios
        $alumno->update();

        // Retornamos la vista que muestra las encuestas junto con un mensaje.
        return redirect()->route('admin.mostrarpagos')->with('respuesta', 'El pago ha sido guardado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
