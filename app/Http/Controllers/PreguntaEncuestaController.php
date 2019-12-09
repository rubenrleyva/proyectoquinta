<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\PreguntaEncuesta;
use App\RespuestaEncuestas;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;

class PreguntaEncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Si el usuario conectado no es administrador lo sacamos avisando.
        if (auth()->user()->tipousuario != 1) {

            return redirect()->route('admin.bienvenido')->with('respuesta', 'No puedes crear encuestas, selecciona una opción de tú menú.');
        }
        $encuesta = Encuesta::find($id);
        $preguntas = PreguntaEncuesta::all()->where('id_encuesta', $id);
        // retornamos la vista a la creación Usuarios.
        return view('admin.mostrarpreguntasencuestas')->with('preguntas', $preguntas)->with('encuesta', $encuesta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Si el usuario conectado no es administrador lo sacamos avisando.
        if (auth()->user()->tipousuario != 1) {

            return redirect()->route('admin.bienvenido')->with('respuesta', 'No puedes crear encuestas, selecciona una opción de tú menú.');
        }
        $encuesta = Encuesta::find($id);
        $preguntas = PreguntaEncuesta::all()->where('id_encuesta', $id);
        // retornamos la vista a la creación Usuarios.
        return view('admin.crearpreguntaencuesta')->with('encuesta', $encuesta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_deprecated(Request $request)
    {

        // Si el usuario conectado es administrador.
        if (auth()->user()->tipousuario != 1) {

            $mensaje = 'No puedes crear preguntas, selecciona una opción de tú menú.';

        }else{
            $numero = 1;

            $filtro = Arr::except($request, ['_token']);
            foreach ($filtro->request as $valor) {

                if($numero == 1){

                    $pregunta = PreguntaEncuesta::create([
                        'id_encuesta' => $request['id'],
                        'numero' => $valor
                    ]);

                    $numero = 2;

                }else{
                    $pregunta->pregunta = $valor;
                    $pregunta->update();
                    $numero = 1;
                }
            }
            $mensaje = 'Las preguntas han sido creadas.';
        }

        return redirect()->route('admin.mostrarencuestas')->with('respuesta', $mensaje);
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

            $mensaje = 'No puedes crear preguntas, selecciona una opción de tú menú.';

        }else{

            $pregunta =  PreguntaEncuesta::where(['numero' => $request['numero'], 'id_encuesta' => $request['id']])->first();
            if($pregunta == null){
                $preguntaNueva = PreguntaEncuesta::create([
                    'id_encuesta' => $request['id'],
                    'numero' => $request['numero'],
                    'tipo' => $request['tipo'],
                    'pregunta' => $request['pregunta']
                ]);
            }
            $tipo = $request['tipo'];
            $filtro = Arr::except($request, ['_token', 'id_pregunta', 'numero', 'pregunta', 'tipo']);
            foreach ($filtro->request as $valor) {

                RespuestaEncuestas::create([
                    'id_pregunta' => $preguntaNueva->id,
                    'tipo' => $tipo,
                    'respuesta' => $valor,
                ]);
            }
            $mensaje = 'Las preguntas han sido creadas.';
        }

        return redirect()->route('admin.mostrarencuestas')->with('respuesta', $mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PreguntaEncuesta  $preguntaEncuesta
     * @return \Illuminate\Http\Response
     */
    public function show(PreguntaEncuesta $preguntaEncuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PreguntaEncuesta  $preguntaEncuesta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // Si el usuario conectado no es administrador lo sacamos avisando.
        if (auth()->user()->tipousuario != 1) {

            return redirect()->route('admin.bienvenido')->with('respuesta', 'No puedes editar las preguntas, selecciona una opción de tú menú.');
        }

        // $encuesta = Encuesta::find($id);

        //$preguntas = PreguntaEncuesta::all()->where('id_encuesta', $id);
        $pregunta = PreguntaEncuesta::find($id);
        $encuesta = Encuesta::find($pregunta->id_encuesta);
        $respuestas = RespuestaEncuestas::all()->where('id_pregunta', $id);

        // retornamos la vista a la creación Usuarios.
        return view('admin.crearpreguntaencuesta')->with('encuesta', $encuesta)->with('pregunta', $pregunta)->with('respuestas', $respuestas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PreguntaEncuesta  $preguntaEncuesta
     * @return \Illuminate\Http\Response
     */
    public function deprecated_edit($id)
    {
        // Si el usuario conectado no es administrador lo sacamos avisando.
        if (auth()->user()->tipousuario != 1) {

            return redirect()->route('admin.bienvenido')->with('respuesta', 'No puedes editar las preguntas, selecciona una opción de tú menú.');
        }
        $encuesta = Encuesta::find($id);

        // retornamos la vista a la creación Usuarios.
        return view('admin.crearpreguntaencuesta')->with('encuesta', $encuesta)->with('preguntas', $preguntas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PreguntaEncuesta  $preguntaEncuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // Si el usuario conectado es administrador.
        if (auth()->user()->tipousuario != 1) {

            $mensaje = 'No puedes crear preguntas, selecciona una opción de tú menú.';

        }else{

            $pregunta =  PreguntaEncuesta::where(['id' => $request['id_pregunta'], 'id_encuesta' => $request['id']])->first();
            if($pregunta == null){
                $this->validate($request, [
                    'id_encuesta' => ['required', 'unique:pregunta_encuestas'],
                    'numero' => ['required', 'unique:pregunta_encuestas'],
                    'pregunta' => ['required', 'unique:pregunta_encuestas']
                ]);

                $nuevaPregunta = PreguntaEncuesta::create([
                    'id_encuesta' => $request['id'],
                    'numero' => $request['numero'],
                    'tipo' => $request['tipo'],
                ]);
            }else{
                $pregunta =  PreguntaEncuesta::where(['numero' => $request['numero']])->first();
                if($pregunta == null){

                    $this->validate($request, [
                        'numero' => ['required', 'unique:pregunta_encuestas']
                    ]);

                    $pregunta->numero = $request['numero'];
                    $pregunta->pregunta = $request['pregunta'];
                    $pregunta->tipo = $request['tipo'];
                    $pregunta->update();
                }else{
                    $pregunta =  PreguntaEncuesta::where(['pregunta' => $request['pregunta']])->first();
                    if($pregunta == null){
                        $this->validate($request, [
                            'pregunta' => ['required', 'unique:pregunta_encuestas']
                        ]);

                        $pregunta->pregunta = $request['pregunta'];
                        $pregunta->tipo = $request['tipo'];
                        $pregunta->update();
                    }
                }
            }

            $numero = 1;
            $numeroPreguntaEncuesta = 0;
            $preguntas = PreguntaEncuesta::all()->where('id_encuesta', $request['id']);
            $filtro = Arr::except($request, ['_token']);
            dd($filtro);
            foreach ($filtro->request as $valor) {

                if($numero == 1){

                    $numeroPreguntaEncuesta = $valor;
                    $numero++;

                }else{
                    if(isset($nuevaPregunta)){
                        $nuevaPregunta->pregunta = $valor;
                        $nuevaPregunta->update();
                    }else{
                        $pregunta = PreguntaEncuesta::where(['numero' => $numeroPreguntaEncuesta ,'id_encuesta' => $request['id']])->first();
                        $pregunta->pregunta = $valor;
                        $pregunta->update();
                    }
                    $numero--;
                }
            }
            $mensaje = 'Las preguntas han sido creadas.';
        }

        return redirect()->route('admin.mostrarencuestas')->with('respuesta', $mensaje);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PreguntaEncuesta  $preguntaEncuesta
     * @return \Illuminate\Http\Response
     */
    public function update_deprecated(Request $request)
    {
        dd("hola");
         // Si el usuario conectado es administrador.
        if (auth()->user()->tipousuario != 1) {

            $mensaje = 'No puedes crear preguntas, selecciona una opción de tú menú.';

        }else{
            $numero = 1;
            $numeroPreguntaEncuesta = 0;
            $preguntas = PreguntaEncuesta::all()->where('id_encuesta', $request['id']);
            $filtro = Arr::except($request, ['_token']);
            foreach ($filtro->request as $valor) {

                if($numero == 1){
                    $pregunta =  PreguntaEncuesta::where(['numero' => $valor ,'id_encuesta' => $request['id']])->first();
                    if($pregunta == null){
                        $nuevaPregunta = PreguntaEncuesta::create([
                            'id_encuesta' => $request['id'],
                            'numero' => $valor
                        ]);
                    }
                    $numeroPreguntaEncuesta = $valor;
                    $numero++;

                }else{
                    if(isset($nuevaPregunta)){
                        $nuevaPregunta->pregunta = $valor;
                        $nuevaPregunta->update();
                    }else{
                        $pregunta = PreguntaEncuesta::where(['numero' => $numeroPreguntaEncuesta ,'id_encuesta' => $request['id']])->first();
                        $pregunta->pregunta = $valor;
                        $pregunta->update();
                    }
                    $numero--;
                }
            }
            $mensaje = 'Las preguntas han sido creadas.';
        }

        return redirect()->route('admin.mostrarencuestas')->with('respuesta', $mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PreguntaEncuesta  $preguntaEncuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pregunta = PreguntaEncuesta::find($id);
        $id = $pregunta->id_encuesta;

        // En caso de ser Administradores
        if (auth()->user()->tipousuario == 1) {
            $preguntas = PreguntaEncuesta::all()->where('id_encuesta', $pregunta->id_encuesta);
            $pregunta->delete();
            // devolvemos un mensaje.
            $respuesta = 'La pregunta ha sido elimianada.';
        } else {

            // devolvemos un mensaje.
            $respuesta = 'No puedes borrar la pregunta, elige otra opción de tu menú.';
        }

        // retornamos la ruta de muestra de usuarios.
        //return redirect()->route('admin.encuestas', compact('id'));
        return redirect()->route('admin.mostrarpreguntasencuestas', $id);
    }
}
