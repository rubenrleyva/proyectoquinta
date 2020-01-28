<?php

namespace App\Http\Controllers;

use App\Servicio;
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
     * Devuelve los usuarios que hay en el sistema.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recogemos todos los usuarios.
        $usuarios = User::all();

        // Devolvemos la vista con los usuarios.
        return view('admin.mostrarusuarios', compact('usuarios'));

    }

    /**
     * Mostramos la vista encargada de la creación de un nuevo usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Devolvemos la vista de creación de usuarios.
        return view('admin.crearusuario');

    }

    /**
     * Guardamos los datos en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validamos los datos que nos llegan.
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

        ]);

        // Comprobamos que la foto existe
        if($request->file('foto')){

            // escogemos el tipo de foto
            $tipo = "estudiantes";

            // elegimos el nombre del archivo y su ubicación
            $path = 'img/'.$tipo.'/'.Str::random(30).'.'.'jpg';

            // le pasamos la imagen, el tamaño y guardamos
            Image::make($request->file('foto'))
            ->resize(189, 188, function ($constraint) {
                $constraint->upsize();
            })->save($path, 80);

            // creamos una nueva foto y le pasamos la URL
            $foto = Foto::create([
                'url_foto' => $path,
                'tipo_foto' => $tipo,
            ]);

        // si la foto no existe
        }else{

            // escogemos el tipo de foto
            $tipo = "estudiantes";

            // elegimos el nombre del archivo y su ubicación
            $path = 'img/'.$tipo.'/'.Str::random(30).'.'.'jpg';

            // le pasamos la imagen predefinida para casos sin foto, el tamaño y guardamos
            Image::make('img\sin-foto.png')
            ->resize(189, 188, function ($constraint) {
                $constraint->upsize();
            })->save($path, 80);

            // creamos una nueva foto y le pasamos la URL
            $foto = Foto::create([
                'url_foto' => $path,
                'tipo_foto' => $tipo,
            ]);
        }

        // Creamos el nuevo usuario con los datos que nos llegan
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
            'clasespracticas' => 0,
            'tipousuario' => 2,
            'teorico' => $request['teorico'],
            'id_foto' => $foto->id,
            'practico' => $request['practico'],
        ]);

        // Retornamos a la vista que muestra los usuarios junto con una respuesta.
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
     * Mostramos el formulario de edición de un usuario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscamos el usuario
        $usuario = User::find($id);

        // Retornamos la vista a la edición de con los datos del usuario.
        return view('admin.crearusuario', compact('usuario', $usuario));

    }

    /**
     * Actualizamos los datos del usuario editado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Buscamos al usuario
        $usuario = User::find($id);

        // Validamos el campo de nombre
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        // Comprobamos si el email es igual al de la base de datos
        if ($usuario->email != $request->get('email')) {

            // en caso de no serlo validamos
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

        // comprobamos si el password es nulo
        }elseif($request->get('password') != null){

            // en tal caso lo validamos.
            $this->validate($request, [
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);

        // comprobamos si la matrícula es igual al de la base de datos
        }elseif($usuario->matricula != $request->get('matricula')){

            // en caso de no serlo la validamos
            $this->validate($request, [
                'matricula' => ['required', 'string', 'min:1', 'unique:users'],
            ]);

        // comprobamos si el DNI es igual al de la base de datos
        }elseif($usuario->dni != $request->get('dni')){

            // en caso de no serlo lo validamos
            $this->validate($request, [
                'dni' => ['required', 'string', 'max:255', 'unique:users'],
            ]);
        }

        // Validamos que existen el resto de datos
        $this->validate($request, [
            'domicilio' => ['required', 'string', 'max:255'],
            'fechanacimiento' => ['required', 'date'],
            'telefono' => ['required', 'string', 'max:255'],
            'localidad' => ['required', 'string', 'max:255'],
            'codigopostal' => ['required', 'string', 'min:5'],
        ]);

        // Comprobamos si disponemos de una foto
        if($request->file('foto')){

            // escogemos el tipo de foto
            $tipo = "estudiantes";

            // elegimos el nombre del archivo y su ubicación
            $path = 'img/'.$tipo.'/'.Str::random(30).'.'.'jpg';

            // le pasamos la imagen, el tamaño y guardamos
            Image::make($request->file('foto'))
            ->resize(189, 188, function ($constraint) {
                $constraint->upsize();
            })->save($path, 80);

            // creamos una nueva foto y le pasamos la URL
            $foto = Foto::create([
                'url_foto' => $path,
                'tipo_foto' => $tipo,
            ]);

        // si no existe foto 
        }else{

            // escogemos el tipo de foto
            $tipo = "estudiantes";

            // elegimos el nombre del archivo y su ubicación
            $path = 'img/'.$tipo.'/'.Str::random(30).'.'.'jpg';

            // le pasamos la imagen, el tamaño y guardamos
            Image::make('img\sin-foto.png')
            ->resize(189, 188, function ($constraint) {
                $constraint->upsize();
            })->save($path, 80);

            // creamos una nueva foto y le pasamos la URL
            $foto = Foto::create([
                'url_foto' => $path,
                'tipo_foto' => $tipo,
            ]);
        }

        // actualizamos los diferentes valores
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
        $usuario->tipousuario = 2;

        $usuario->clasespracticas = $usuario->clasespracticas;
        $usuario->matricula = $request['matricula'];
        $usuario->teorico = $request['teorico'];
        $usuario->practico = $request['practico'];
        $usuario->id_foto = $foto->id;

        $usuario->update();
        // damos una respuesta de los sucedido.
        $respuesta = 'El usuario '.$request['name'].' ha sido editado.';

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

        if($usuario->tipousuario == 1){

            $respuesta = 'El usuario elegido no puede eliminarse.';

        }else{

            // Busamos la foto en el sistema.
            $foto = Foto::find($usuario->id_foto);

             // eliminamos el archivo del sistema.
            Storage::disk('public')->delete($foto->url_foto);
            
            $usuario->delete();
            // devolvemos un mensaje.
            $respuesta = 'El usuario ha sido elimianado.';
        }

        // retornamos la ruta de muestra de usuarios.
        return redirect()->route('admin.mostrarusuarios')->with('respuesta', $respuesta);
    }
}
