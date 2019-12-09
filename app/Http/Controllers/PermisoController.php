<?php

namespace App\Http\Controllers;

use App\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Si el usuario conectado es Administrador General.
        if (auth()->user()->tipousuario == 1) {
            // recogemos todos los Usuarios.
            $permisos = Permiso::all();
            // retornamos la vista de Usuarios.
            return view('admin.mostrarpermisos', compact('permisos'));

        } else {
            // retornamos la ruta al inicio privado con un mensaje de advertencia.
            return redirect()->route('admin.mostrarpermisos')->with('respuesta', 'No puedes ver los permisos, selecciona una opción de tú menú.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Si el usuario conectado no es Administrador lo sacamos avisando.
        if (auth()->user()->tipousuario != 1) {
            return redirect()->route('admin.mostrarpermisos')->with('respuesta', 'No puedes crear permisos, selecciona una opción de tú menú.');
        } 

        // retornamos la vista a la creación Usuarios.
        return view('admin.crearpermiso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Si el usuario conectado es administrador.
        if (auth()->user()->tipousuario != 1) {

            $mensaje = 'No puedes crear Usuarios, selecciona una opción de tú menú.';
        
        }else{

            $this->validate($request, [
                'tipopermiso' => ['required', 'string', 'max:100'],
                'descripcion' => ['required', 'string', 'max:255'],             
            ]); 
            
            if ($request['texto1']) {  
               $this->validate($request, [
                    'texto1' => ['required', 'string', 'max:255']            
                ]);
            }
            
            if ($request['texto2']){
                $this->validate($request, [
                    'texto2' => ['required', 'string', 'max:255'],       
                ]);
                
            }
            if ($request['texto3']){
                $this->validate($request, [
                    'texto3' => ['required', 'string', 'max:255'],            
                ]);
                
            }
            
            if ($request['texto4']){
                $this->validate($request, [
                    'texto4' => ['required', 'string', 'max:255'],              
                ]);
            }
            
            if ($request['texto5']){
                $this->validate($request, [
                    'texto5' => ['required', 'string', 'max:255'],              
                ]);
                 
            }
            
            if ($request['texto6']){
                $this->validate($request, [
                    'texto6' => ['required', 'string', 'max:255'],              
                ]);
            }
            
            if ($request['texto7']){
                $this->validate($request, [
                    'texto7' => ['required', 'string', 'max:255'],              
                ]);
            }
            
            $this->validate($request, [
                'clases' => ['required'],
                'precio' => ['required'],
                'precioiva' => ['required'],
                'precioferta' => ['required'],              
            ]);

            

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

            $mensaje = 'El permiso ha sido creado.';
        }

        return redirect()->route('admin.mostrarpermisos')->with('respuesta', $mensaje);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscamos al usuario
        $permiso = Permiso::find($id);
        // Si el usuario conectado es el administrador.
        if (auth()->user()->tipousuario == 1) {
             // retornamos la vista a la creación usuarios.
            return view('admin.crearpermiso', compact('permiso', $permiso));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Buscamos al usuario
        $permiso = Permiso::find($id);
        if (auth()->user()->tipousuario == 1) {
            $this->validate($request, [
                'tipopermiso' => ['required', 'string', 'max:100'],
                'descripcion' => ['required', 'string', 'max:255'],             
            ]);

            $permiso->tipopermiso = $request['tipopermiso'];
            $permiso->descripcion = $request['descripcion'];

            if ($request['texto1']) {  
               $this->validate($request, [
                    'texto1' => ['required', 'string', 'max:255']            
                ]);
                $permiso->texto1 = $request['texto1'];
            }
            
            if ($request['texto2']){
                $this->validate($request, [
                    'texto2' => ['required', 'string', 'max:255'],       
                ]);
                $permiso->texto2 = $request['texto2'];
            }
            if ($request['texto3']){
                $this->validate($request, [
                    'texto3' => ['required', 'string', 'max:255'],            
                ]);
                $permiso->texto3 = $request['texto3'];
            }
            
            if ($request['texto4']){
                $this->validate($request, [
                    'texto4' => ['required', 'string', 'max:255'],              
                ]);
                $permiso->texto4 = $request['texto4'];
            }
            
            if ($request['texto5']){
                $this->validate($request, [
                    'texto5' => ['required', 'string', 'max:255'],              
                ]);
                $permiso->texto5 = $request['texto5'];
            }
            
            if ($request['texto6']){
                $this->validate($request, [
                    'texto6' => ['required', 'string', 'max:255'],              
                ]);
                $permiso->texto6 = $request['texto6'];
            }
            
            if ($request['texto7']){
                $this->validate($request, [
                    'texto7' => ['required', 'string', 'max:255'],              
                ]);
                $permiso->texto7 = $request['texto7'];
            }

            if ($request['texto8']){
                $this->validate($request, [
                    'texto8' => ['required', 'string', 'max:255'],              
                ]);
                $permiso->texto8 = $request['texto8'];
            }
            
            $this->validate($request, [
                'clases' => ['required'],
                'precio' => ['required'],
                
                'precioferta' => ['required'],              
            ]);

            $permiso->clases = $request['clases'];
            $permiso->precio = $request['precio'];
            $permiso->precioiva = $request['precioiva'];
            $permiso->precioferta = $request['precioferta'];
            $permiso->oferta = $request['oferta'];
            
            $permiso->update();
            
            $respuesta = 'El permiso '.$request['tipopermiso'].' ha sido creado.';

        } else {
            // retornamos la ruta al inicio privado con un mensaje de advertencia.
            return redirect()->route('admin.mostrarpermisos')->with('respuesta', 'No puedes editar los usuarios, selecciona una opción de tú menú.');
        }
        
        // retornamos la ruta de muestra de usuarios.
        return redirect()->route('admin.mostrarpermisos')->with('respuesta', $respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
