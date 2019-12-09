<?php

namespace App\Http\Controllers;

use App\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit(Foto $foto)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($usuario)
    {

        $foto = Foto::find($usuario->foto->id);

        if($foto){

            // eliminamos el archivo.
            Storage::disk('public')->delete($foto->id);

            $foto->url_foto = "";
            $foto->update();

        // si la foto no tiene url
        if($foto->url_foto == ""){

          // la respuesta será que la ha borrado.
          $respuesta = "La foto se ha borrado, elige otra.";

        // en caso contrario.
        }else{

          // indicamos que no foto no ha sido guardada.
          $respuesta = "La foto no se ha borrado.";
        }
      }

      // Retornamos a la pantalla de editar el Ayuntamiento con un mensaje.
      return redirect()->route('admin.editarusuario.editar', $usuario)->with('respuestafotos',$respuesta);
    }
}
