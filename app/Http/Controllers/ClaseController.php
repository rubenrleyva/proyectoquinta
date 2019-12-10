<?php

namespace App\Http\Controllers;

use App\Clase;
use App\User;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = Clase::all();
        $usuarios = User::all();
    
        return view('admin.mostrarclases')->with('clases', $clases)->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clases = Clase::all();
        $usuarios = User::all()->where('practico', 2);
        $profesor = auth()->user();
       
        return view('admin.crearclase', compact('clases', 'usuarios', 'profesor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $alumno = User::find($request['alumno']);

        $this->validate($request, [
            'comentarios' => ['required', 'string', 'max:255'],
            'precio' => ['required'],
            'precioiva' => ['required'],
        ]);

        $numeroClases = Clase::all()->where('id_alumno', $request['alumno'])->count();

        if($numeroClases == null){

            $numeroClase = 0;

        }else{

            $numeroClase = $numeroClases;
        }

        if($alumno->clasespracticas > 0){

            Clase::create([
                'clase_numero' => $numeroClase + 1,
                'id_alumno' => $request['alumno'],
                'id_profesor' => auth()->user()->id,
                'comentarios' => $request['comentarios'],
                'precio' => 0,
                'precioiva' => 0,
            ]);

            $alumno->clasespracticas = $alumno->clasespracticas - 1;

            $alumno->update();

        }else{

            Clase::create([
                'clase_numero' => $numeroClase + 1,
                'id_alumno' => $request['alumno'],
                'id_profesor' => auth()->user()->id,
                'comentarios' => $request['comentarios'],
                'precio' => $request['precio'],
                'precioiva' => $request['precioiva'],
            ]);
        }

        return redirect()->route('admin.mostrarclases')->with('respuesta', 'La clase ha sido creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        //
    }
}
