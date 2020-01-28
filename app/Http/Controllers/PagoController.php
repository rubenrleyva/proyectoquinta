<?php

namespace App\Http\Controllers;

use App\Pago;
use App\User;
use App\Servicio;
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
        // Recuperamos los pagos del sistema
        $pagos = Pago::all();

        // Recuperamos los usuarios del sistema
        $usuarios = User::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.mostrarpagos', compact('pagos', 'usuarios'));
    }

    /**
     * Función encargada de mostrar la pantalla de creación de pagos.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        // Recupermaos los servicios del sistema
        $servicios = Servicio::all();

        // Recuperamos los alumnos del sistema que sean de tipo 2
        //$usuario = User::all()->where('tipousuario', 2);

        // Recuperamos el usuario
        $usuario = User::find($id);

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.crearpago', compact('servicios', 'usuario'));
    }

    /**
     * Función encargada de guardar un nuevo pago.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        // Buscamos el alumno en el sistema
        $alumno = User::find($request['id']);

        // Recuperamos el número de pagos que tiene dicho alumno
        $pagos = Pago::all()->where('id_usuario', $request['alumno'])->count();

        // Validamos los datos que nos pasan
       $this->validate($request, [
            'concepto' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'string', 'max:255'],
            'precioiva' => ['required', 'string', 'max:255'],
        ]);

        // Si está pagado
        if($request['pagado']){

            // devolvemos 1
            $pagado = 1;
        
        // en caso contrario 
        }else{

            // devolvemos 2
            $pagado = 0;
        }

        // Creamos un nuevo pago.
        Pago::create([
            'id_usuario' => $request['id'],
            'numeropago' => $pagos + 1,
            'concepto' => $request['concepto'],
            'precioclases' => $request['preciopermiso'],
            'clases' => $request['numeroclases'],
            'precio' => $request['precio'],
            'precioiva' => $request['precioiva'],
            'pagado' => $pagado,
        ]);

        // Actualizamos las clases prácticas del alumno.
        $alumno->clasespracticas = $alumno->clasespracticas + $request['numeroclases'];

        // Guardamos los cambios
        $alumno->update();

        // Retornamos la vista que muestra los pagos que h¡ay en el sistema
        return redirect()->route('admin.mostrarusuarios')->with('respuesta', 'El pago ha sido guardado.');
    
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
     * Función encargada de la edición de un pago
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicios = Servicio::all();
        $pago = Pago::find($id);
        $usuario = User::find($pago->id_usuario);


        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.crearpago', compact('usuario', 'servicios', 'pago'));
    }

    /**
     * Función encargada de actualizar los pagos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        // Buscamos el alumno
        $alumno = User::find($request['id']);

        // Buscamos el número de pagos que tiene
        $pagos = Pago::all()->where('id_usuario', $request['alumno'])->count();

        $pago = Pago::find($id);

        // Validamos algunos datos.
       $this->validate($request, [
            'concepto' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'string', 'max:255'],
            'precioiva' => ['required', 'string', 'max:255'],
        ]);

        // Si está pagado
        if($request['pagado']){

            // devolvemos 1
            $pagado = 1;
        
        // en caso contrario 
        }else{

            // devolvemos 2
            $pagado = 0;
        }

        // Actualizamos las clases prácticas del alumno restando las clases prácticas.
        $alumno->clasespracticas = $alumno->clasespracticas - $pago->clases;

        $pago->concepto = $request['concepto'];
        $pago->precioclases = $request['preciopermiso'];
        $pago->clases = $request['numeroclases'];
        $pago->precio = $request['precio'];
        $pago->precioiva = $request['precioiva'];
        $pago->pagado = $pagado;

        $pago->update();

        // Actualizamos las clases prácticas del alumno sumando las nuevas clases prácticas.
        $alumno->clasespracticas = $alumno->clasespracticas + $request['numeroclases'];

        // Guardamos los cambios
        $alumno->update();

        // Retornamos la vista que muestra las encuestas junto con un mensaje.
        return redirect()->route('admin.mostrarpagos')->with('respuesta', 'El pago ha sido guardado.');
        
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
