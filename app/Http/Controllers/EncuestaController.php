<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\PreguntaEncuesta;
use App\RespuestaEncuestas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Controlador encargado de las encuestas.
 * Versión 1 01/12/2019
 */
class EncuestaController extends Controller
{
    /**
     * Se muestra por pantalla todas las encuestas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $encuestas = Encuesta::all();
        $preguntasEncuesta = PreguntaEncuesta::all();
    
        return view('admin.mostrarencuestas')->with('encuestas', $encuestas)->with('preguntas', $preguntasEncuesta);
    }

    /**
     * Muestra por pantalla el formulario de creación de encuestas.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $preguntasEncuesta = PreguntaEncuesta::find(1);
        $encuestas = Encuesta::all();
       
        return view('admin.crearencuesta');
    }

    /**
     * Guarda en la base de datos la nueva encuesta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'titulo' => ['required', 'string', 'max:255', 'unique:encuestas'],
        ]);

        Encuesta::create([
            'titulo' => $request['titulo'],
            'uuid' => Str::slug($request['titulo']),
        ]);

        return redirect()->route('admin.mostrarencuestas')->with('respuesta', 'La encuesta '.$request['titulo'].' ha sido creada.');
    }

    /**
     * Muetra por pantlla una encuesta en particular.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
        //$preguntasEncuesta = PreguntaEncuesta::all()->where('id_encuesta', $id);
        //$numeroPreguntas = $preguntasEncuesta->count();
        //$encuesta = Encuesta::find($id);

        //return view('admin.encuesta')->with('preguntasEncuesta', $preguntasEncuesta)->with('encuesta', $encuesta)->with('numeroPreguntas', $numeroPreguntas);
    
        $encuesta = Encuesta::where('uuid','=', $slug)->firstOrFail();
        $preguntasEncuesta = PreguntaEncuesta::all()->where('id_encuesta', $encuesta->id);
        $numeroPreguntas = $preguntasEncuesta->count();

        return view('admin.encuesta')->with('preguntasEncuesta', $preguntasEncuesta)->with('encuesta', $encuesta)->with('numeroPreguntas', $numeroPreguntas);

    }


    /**
     * Muestra por pantalla el formulario de edición de una encuesta.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $encuesta = Encuesta::find($id);
     
        return view('admin.crearencuesta')->with('encuesta', $encuesta);
    }

    /**
     * Guarda en la base de datos la encuesta editada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encuesta  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $encuesta = Encuesta::find($id);

        if($encuesta->titulo != $request['titulo']){

            $this->validate($request, [
                'titulo' => ['required', 'string', 'max:255', 'unique:encuestas'],
            ]);

            $encuesta->titulo = $request['titulo'];
            $encuesta->uuid = Str::slug($request['titulo']);

            $encuesta->update();
        
        }

        return redirect()->route('admin.mostrarencuestas')->with('respuesta', 'La encuesta '.$request['titulo'].' ha sido editada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encuesta = Encuesta::find($id);

        if (auth()->user()->tipousuario == 1) {
            $preguntas = PreguntaEncuesta::all()->where('id_encuesta', $id);
            foreach ($preguntas as $pregunta){
                $respuestas = RespuestaEncuestas::all()->where('id_pregunta', $pregunta->id);
                foreach ($respuestas as $respuesta){
                    $respuesta->delete();
                }
                $pregunta->delete();
            }
            $encuesta->delete();
            $respuesta = 'La encuesta ha sido elimianada.';
        } else {

      
            $respuesta = 'No puedes borrar la encuesta, elige otra opción de tu menú.';
        }

  
        return redirect()->route('admin.mostrarencuestas')->with('respuesta', $respuesta);
    }
}
