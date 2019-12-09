<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\User;
use App\Foto;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = User::all();
        return view('admin.mostrarusuarios', compact('usuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.crearusuario');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'dni' => ['required', 'string', 'max:255', 'unique:users'],
            'domicilio' => ['required', 'string', 'max:255'],
            'fechanacimiento' => ['required', 'date'],
            'telefono' => ['required', 'string', 'max:255'],
            'localidad' => ['required', 'string', 'max:255'],
            'codigopostal' => ['required', 'string', 'min:5'],
            'foto' => ['required', 'file'],
        ]);

        // Si la foto existe
        if($request->file('foto')){

        if($request['tipousuario'] == 1){
            $tipo = "profesores";
        }else{
            $tipo = "alumnos";
        }

        // elegimos el nombre del archivo y su ubicación
        $path = 'img/'.$tipo.'/'.Str::random(30).'.'.'jpg';;

        // le pasamos la imagen, el tamaño y guardamos
        Image::make($request->file('foto'))
        ->resize(189, 188, function ($constraint) {
            $constraint->upsize();
        })->save($path, 80);

        // creamos una nueva foto y le pasamos la URL
        $foto = Foto::create([
            'url_foto' => $path,
        ]);

        }

        if($request['tipousuario'] == 1){

            User::create([
                'name' => $request['name'],
                'apellidos' => $request['apellidos'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'dni' => $request['dni'],
                'domicilio' => $request['domicilio'],
                'fechanacimiento' => $request['fechanacimiento'],
                'telefono' => $request['telefono'],
                'localidad' => $request['localidad'],
                'codigopostal' => $request['codigopostal'],
                'tipousuario' => $request['tipousuario'],
                'foto_id' => $foto->id,
            ]);

        }else{

            User::create([
                'name' => $request['name'],
                'apellidos' => $request['apellidos'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'dni' => $request['dni'],
                'domicilio' => $request['domicilio'],
                'fechanacimiento' => $request['fechanacimiento'],
                'telefono' => $request['telefono'],
                'localidad' => $request['localidad'],
                'codigopostal' => $request['codigopostal'],
                'matricula' => $request['matricula'],
                'clasespracticas' => $request['clasespracticas'],
                'tipousuario' => $request['tipousuario'],
                'teorico' => $request['teorico'],
                'practico' => $request['practico'],
                'foto_id' => $foto->id,
            ]);

        }

        return redirect()->route('admin.mostrarusuarios')->with('respuesta', 'El usuario '.$request['name'].' ha sido creado.');

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
        // Buscamos al usuario
        $usuario = User::find($id);

        // Si el usuario conectado es el administrador.
        if (auth()->user()->tipousuario == 1) {
             // retornamos la vista a la creación usuarios.
            return view('admin.crearusuario', compact('usuario', $usuario));
        }
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
        // Buscamos al usuario
        $usuario = User::find($id);
        if (auth()->user()->tipousuario == 1) {
            $this->validate($request, [
                    'name' => ['required', 'string', 'max:255'],
                ]);
            if ($usuario->email != $request->get('email')) {
                $this->validate($request, [
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
            }elseif($request->get('password') != null){
                $this->validate($request, [
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
                ]);
            }elseif($usuario->matricula != $request->get('matricula')){
                $this->validate($request, [
                    'matricula' => ['required', 'string', 'min:1', 'unique:users'],
                ]);
            }elseif($usuario->dni != $request->get('dni')){
                $this->validate($request, [
                     'dni' => ['required', 'string', 'max:255', 'unique:users'],
                ]);
            }
            $this->validate($request, [
                'domicilio' => ['required', 'string', 'max:255'],
                'fechanacimiento' => ['required', 'date'],
                'telefono' => ['required', 'string', 'max:255'],
                'localidad' => ['required', 'string', 'max:255'],
                'codigopostal' => ['required', 'string', 'min:5'],
            ]);

            // actualizamos los diferentes valores..
            $usuario->name = $request['name'];
            $usuario->email = $request['email'];

            // comprobamos si hay datos de password
            if($request->get('password')){

              // los actualizamos
              $usuario->password = Hash::make($request['password']);
            }

            $usuario->dni = $request['dni'];
            $usuario->domicilio = $request['domicilio'];
            $usuario->fechanacimiento = $request['fechanacimiento'];
            $usuario->telefono = $request['telefono'];
            $usuario->localidad = $request['localidad'];
            $usuario->codigopostal = $request['codigopostal'];
            $usuario->tipousuario = $request['tipousuario'];

            if($request['tipousuario'] == 2){
                $usuario->clasespracticas = $request['clasespracticas'];
                $usuario->matricula = $request['matricula'];
                $usuario->teorico = $request['teorico'];
                $usuario->practico = $request['practico'];
            }else{
                $usuario->clasespracticas = null;
                $usuario->matricula = null;
                $usuario->teorico = null;
                $usuario->practico = null;
            }

            $usuario->update();
            // damos una respuesta de los sucedido.
            $respuesta = 'El usuario '.$request['name'].' ha sido creado.';
            // en caso contrario.

        } else {
            // retornamos la ruta al inicio privado con un mensaje de advertencia.
            return redirect()->route('inicio')->with('respuesta', 'No puedes editar los usuarios, selecciona una opción de tú menú.');
        }

        // retornamos la ruta de muestra de usuarios.
        return redirect()->route('admin.mostrarusuarios')->with('respuesta', $respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        // En caso de ser Administradores
        if (auth()->user()->tipousuario == 1) {
            if($usuario->tipousuario == 1){
                $respuesta = 'El usuario elegido no puede eliminarse.';
            }else{
                $usuario->delete();
                // devolvemos un mensaje.
                $respuesta = 'El usuario ha sido elimianado.';
            }
        } else {

            // devolvemos un mensaje.
            $respuesta = 'No puedes borrar usuarios, elige otra opción de tu menú.';
        }

        // retornamos la ruta de muestra de usuarios.
        return redirect()->route('admin.mostrarusuarios')->with('respuesta', $respuesta);
    }
}