<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\PreguntaEncuesta;
use App\RespuestaEncuestas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Clase Controlador encargada de controlar las encuestas creadas por autoescuela.
 * Versión 1 01/12/2019
 */
class EncuestaController extends Controller
{
    /**
     * Función encargada de mostrar la lista de las encuestas que existen en el sistema.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recogemos el valor de todas las encuestas del sistema.
        $encuestas = Encuesta::all();

        // Recogemos el valor de todas las preguntas del sistema.
        $preguntasEncuesta = PreguntaEncuesta::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.mostrarencuestas', compact('encuestas', 'preguntasEncuesta'));
    }

    /**
     * Función encargada de mostrar la pantalla de creación de encuestas.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Recogemos el valor de todas las encuestas del sistema.
        $encuestas = Encuesta::all();

        // Recogemos el valor de todas las preguntas de la encuesta en cuestión.
        $preguntasEncuesta = PreguntaEncuesta::find(1);

        // Retornamos la vista de creación de encuestas.
        return view('admin.crearencuesta');
    }

    /**
     * Función encargada de guardar en la base de datos las nuevas encuestas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Comprobamos que son válidos los datos introducidos.
        $this->validate($request, [
            'titulo' => ['required', 'string', 'max:255', 'unique:encuestas'],
        ]);

        // Creamos la nueva encuesta
        Encuesta::create([
            'titulo' => $request['titulo'],
            'uuid' => Str::slug($request['titulo']),
        ]);

        // Retornamos la vista que muestra las encuestas junto con un mensaje.
        return redirect()->route('admin.mostrarencuestas')->with('respuesta', 'La encuesta '.$request['titulo'].' ha sido creada.');
    }

    /**
     * Función encargada de mostrar por pantlla una encuesta para su realización.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        // Buscamos y recogemos la encuesta en cuestión.
        $encuesta = Encuesta::where('uuid','=', $slug)->firstOrFail();

        // Buscamos y recogemos las preguntas de la encuesta en cuestión.
        $preguntasEncuesta = PreguntaEncuesta::all()->where('id_encuesta', $encuesta->id);

        // Contamos el número de preguntas de la encuesta.
        $numeroPreguntas = $preguntasEncuesta->count();

        // Retornamos la vista que muestra la encuesta a realizar junto con los datos de la misma.
        return view('admin.encuesta', compact('preguntasEncuesta', 'encuesta', 'numeroPreguntas'));

    }


    /**
     * Función encargada de mostrar la pantalla de edición de la encuesta.
     *
     * @param  \App\Encuesta  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscamos la encuesta a editar en el sistema.
        $encuesta = Encuesta::find($id);

        // Retornamos la vista que muestra la encuesta a editar.
        return view('admin.crearencuesta')->with('encuesta', $encuesta);
    }

    /**
     * Función encargada de guardar en la base de datos la encuesta editada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encuesta  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Buscamos la encuesta editada en el sistema.
        $encuesta = Encuesta::find($id);

        // Si la encuesta no tiene el mismo título.
        if($encuesta->titulo != $request['titulo']){

            // validamos el nuevo título
            $this->validate($request, [
                'titulo' => ['required', 'string', 'max:255', 'unique:encuestas'],
            ]);

            // le pasamos el nuevo título a la encuesta
            $encuesta->titulo = $request['titulo'];

            // la pasamos el nuevo valor slug
            $encuesta->uuid = Str::slug($request['titulo']);

            // actualizamos la encuesta
            $encuesta->update();

            // damos una respuesta
            $respuesta = 'La encuesta '.$request['titulo'].' ha sido editada.';

        }

        // Retornamos la vista que muestra las encuestas con una respuesta
        return redirect()->route('admin.mostrarencuestas')->with('respuesta', $respuesta);
    }

    /**
     * Función encargada de borrar una encuesta del sistema.
     *
     * @param  \App\Encuesta  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscamos la encuesta a borrar del sistema.
        $encuesta = Encuesta::find($id);

        // Si la encusta existe
        if($encuesta){

            // buscamos sus preguntas
            $preguntas = PreguntaEncuesta::all()->where('id_encuesta', $id);

            // si dispone de preguntas
            if($preguntas){

                // repasamos cada una de las preguntas
                foreach ($preguntas as $pregunta){

                    // buscando sus respuestas.
                    $respuestas = RespuestaEncuestas::all()->where('id_pregunta', $pregunta->id);

                    // y borrándolas del sistema
                    foreach ($respuestas as $respuesta){
                        $respuesta->delete();
                    }

                    // a continuación borramos la pregunta
                    $pregunta->delete();
                }

            }

            // continuamos borrando la encuesta
            $encuesta->delete();

            // damos una respuesta
            $respuesta = 'La encuesta ha sido elimianada.';

        // en caso contrario
        }else{

            // damos una respuesta
            $respuesta = 'No existe la encuesta que busca.';

        }

        // Retornamos la vista que muestra las encuestas con una respuesta.
        return redirect()->route('admin.mostrarencuestas')->with('respuesta', $respuesta);
    }
}
