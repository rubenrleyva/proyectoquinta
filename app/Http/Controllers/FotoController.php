<?php

namespace App\Http\Controllers;

use App\Foto;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recogemos todas las fotos del sistema.
        $fotos = Foto::all();
        
        // Retornamos la vista de dichas fotos.
        return view('admin.mostrarfotos', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // retornamos la vista a la creación Usuarios.
        return view('admin.crearfoto');
    }

    /**
     * Store a newly created resource in storage.
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

            // le pasamos la imagen, el tamaño y guardamos
            Image::make($request->file('foto'))
            ->resize(189, 188, function ($constraint) {
                $constraint->upsize();
            })->save($path, 80);

            // creamos una nueva foto y le pasamos la URL
            $foto = Foto::create([
                'url_foto' => $path,
                'tipo_foto' => $request['tipofoto'],
            ]);

        }

        // Retornamos la vista de dichas fotos.
        return view('admin.mostrarfotos', compact('fotos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $foto = Foto::find($id);
        
        return view('admin.crearfoto', compact('foto', $foto));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        $fotos = Foto::all();

        // Si la foto existe
        if($request->file('foto')){
            
            if($foto->url_foto != "img/sin-foto.png"){
                // eliminamos el archivo.
                Storage::disk('public')->delete($foto->url_foto);
            }
            
            // elegimos el nombre del archivo y su ubicación
            $path = 'img/'.$request['tipofoto'].'/'.Str::random(30).'.'.'jpg';;

            // le pasamos la imagen, el tamaño y guardamos
            Image::make($request->file('foto'))
            ->resize(189, 188, function ($constraint) {
                $constraint->upsize();
            })->save($path, 80);

            $foto->url_foto = $path;
            $foto->tipo_foto = $request['tipofoto'];
            $foto->update();

        }

        // Retornamos la vista de dichas fotos.
        return view('admin.mostrarfotos', compact('fotos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $usuario = User::all()->where('foto_id', $id);
        
        $foto = Foto::find($id);
        $fotos = Foto::all();

        if($foto && (!$usuario->isEmpty())){
            
            // eliminamos el archivo.
            Storage::disk('public')->delete($foto->url_foto);

            // le asignamos una imagen mientras tanto
            $foto->url_foto = "img/sin-foto.png";
            $foto->update();
            $respuesta = "Inserta otra foto";

        }else{

            $foto->delete();
            $respuesta = "Foto eliminada";

        }

        // Retornamos la vista de dichas fotos.
        return view('admin.mostrarfotos', compact('fotos'));
    }
}
