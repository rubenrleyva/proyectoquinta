<?php

namespace App\Http\Controllers;

use App\Foto;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Clase Controlador encaregada de controlar las fotos que realiza la autoescuela.
 * Versión 0.8 14/12/2019
 */
class FotoController extends Controller
{
    /**
     * Función encargada de mostrar la lista de fotos de la autoescuela.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recogemos el valor de todas las fotos del sistema.
        $fotos = Foto::all();

        // Retornamos la vista de dichas fotos.
        return view('admin.mostrarfotos', compact('fotos'));
    }

    /**
     * Función encargada de mostrar la pantalla de creación de fotos.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornamos la vista de creación de una nueva foto.
        return view('admin.crearfoto');
    }

    /**
     * Función encargada de guardar una nueva foto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recogemos todas las fotos del sistema.
        $fotos = Foto::all();

        // Si la foto existe
        if($request->file('foto')){

            // elegimos el nombre del archivo y su ubicación
            $path = 'img/'.$request['tipofoto'].'/'.Str::random(30).'.'.'jpg';;

            // si la foto es para un estudiante o profesor
            if(($request['tipofoto'] == "profesores") || ($request['tipofoto'] == "estudiantes")){
                // le pasamos la imagen, el tamaño y guardamos
                Image::make($request->file('foto'))
                ->resize(189, 188, function ($constraint) {
                    $constraint->upsize();
                })->save($path, 80);

            // en caso contrario
            }else{

                // guardamos la foto sin procesarla
                Image::make($request->file('foto'))->save($path, 80);
            }


            // creamos una nueva foto
            $foto = Foto::create([
                'url_foto' => $path,
                'tipo_foto' => $request['tipofoto'],
                'texto' => $request['texto'],
            ]);

        }

        // Retornamos la vista que muestra todas las fotos del sistema
        return redirect()->route('admin.mostrarfotos', compact('fotos'))->with('respuesta', 'La foto ha sido añadida.');
    }

    /**
     * Función encargada de mostrar una única foto
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Función encargada de mostrar la pantalla de edición de fotos.
     *
     * @param  \App\Foto  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscamos la foto en cuestión
        $foto = Foto::find($id);

        // Retornamos la vista que de edición de la foto.
        return view('admin.crearfoto', compact('foto', $foto));
    }

    /**
     * Función encargada de guardar en la base de datos la foto editada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foto  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Buscamos la foto en el sistema.
        $foto = Foto::find($id);

        // Si la foto existe
        if($foto){

            // comprobamos que nos llega una foto.
            if($request->file('foto')){

                // si la foto es diferente a no tener foto.
                if($foto->url_foto != "img/sin-foto.png"){

                    // eliminamos la foto anterior.
                    Storage::disk('public')->delete($foto->url_foto);
                }

                // elegimos el nombre del archivo y su ubicación
                $path = 'img/'.$request['tipofoto'].'/'.Str::random(30).'.'.'jpg';;


                // si la foto es para un estudiante o profesor
                if(($request['tipofoto'] == "profesores") || ($request['tipofoto'] == "estudiantes")){
                    // le pasamos la imagen, el tamaño y guardamos
                    Image::make($request->file('foto'))
                    ->resize(189, 188, function ($constraint) {
                        $constraint->upsize();
                    })->save($path, 80);

                // en caso contrario
                }else{

                    // guardamos la foto sin procesarla
                    Image::make($request->file('foto'))->save($path, 80);
                }

                // actualizamos el lugar de guardado de la foto.
                $foto->url_foto = $path;

                // actualizamos el tipo de foto.
                $foto->tipo_foto = $request['tipofoto'];
                $foto->texto = $request['texto'];

                // actualizamos la foto.
                $foto->update();

            }

            // damos una respuesta
            $respuesta = 'La imagen ha sido editada';

        // en caso contrario
        }else{

            // damos una respuesta
            $respuesta = 'La imagen no existe en el sistema';
        }

        // Recogemos el valor de todas las encuestas del sistema.
        $fotos = Foto::all();

        // Retornamos la vista de dichas fotos.
        return redirect()->route('admin.mostrarfotos', compact('fotos'))->with('respuesta', $respuesta);
    }

    /**
     * Función encargada de borrar una foto.
     *
     * @param  \App\Foto  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Buscamos el usuario de dicha foto.
        $usuario = User::all()->where('foto_id', $id);

        // Busamos la foto en el sistema.
        $foto = Foto::find($id);

        // Comprobamos que la foto existe y que el usuario no está vacío.
        if($foto && (!$usuario->isEmpty())){

            // eliminamos el archivo del sistema.
            Storage::disk('public')->delete($foto->url_foto);

            // le asignamos una imagen mientras tanto
            $foto->url_foto = "img/sin-foto.png";

            // actualizamos la foto.
            $foto->update();

            // damos una respuesta.
            $respuesta = "Inserta otra fotografía";

        }else{

            // eliminamos el archivo del sistema.
            Storage::disk('public')->delete($foto->url_foto);

            // eliminamos la foto del sistema.
            $foto->delete();

            // damos una respuesta.
            $respuesta = "Fotografía eliminada del sistema";

        }

        // Recogemos el valor de todas las encuestas del sistema.
        $fotos = Foto::all();

        // Retornamos la vista que muestra todas las fotos junto con una respuesta.
        return redirect()->route('admin.mostrarfotos', compact('fotos'))->with('respuesta', $respuesta);
    }
}
