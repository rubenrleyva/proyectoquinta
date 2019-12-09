<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\User;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function infopermisos()
    {
        // Se muestran los cursos
        $usuarios = User::all();
        $permisos = Permiso::all();
        return view('bienvenido')->with('permisos', $permisos)->with('usuarios', $usuarios);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Se muestran los cursos
        $permisos = Permiso::all();
        $profesores = User::all()->where('tipousuario', 1)->count();
        $alumnos = User::all()->where('tipousuario', 2)->count();
        $usuarios = User::all();
        //return view('bienvenido')->with('permisos', $permisos)->with('usuarios', $usuarios)->with('profesores', $profesores);
        return view('bienvenido', compact('permisos', 'usuarios', 'profesores', 'alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
