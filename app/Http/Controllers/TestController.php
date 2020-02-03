<?php

namespace App\Http\Controllers;

use App\Test;
use App\PreguntaTest;
use App\RespuestaTest;
use App\RespuestasTestUsuario;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recogemos el valor de todas los test del sistema.
        $tests = Test::all();

        // Recogemos el valor de todas las preguntas del sistema.
        $preguntasTest = PreguntaTest::all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.mostrartests', compact('tests', 'preguntasTest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornamos la vista de creación del test.
        return view('admin.creartest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Comprobamos que son válidos los datos introducidos.
        $this->validate($request, [
            'titulo' => ['required', 'string'],
            'numero' => ['required', 'integer'],
        ]);

        // Creamos el test
        Test::create([
            'numero' => $request['numero'],
            'tipo' => $request['tipo'],
            'permiso' => $request['permiso'],
            'descripcion' => $request['descripcion'],
            'titulo' => $request['titulo'],
            'uuid' => Str::slug($request['titulo'])."-".$request['numero'],
        ]);

        // Retornamos la vista que muestra los test junto con un mensaje.
        return redirect()->route('admin.mostrartests')->with('respuesta', 'El test '.$request['titulo'].' ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        // Buscamos y recogemos el test en cuestión.
        $test = Test::where('uuid','=', $slug)->firstOrFail();

        // Buscamos y recogemos las preguntas de la encuesta en cuestión.
        $preguntasTest = PreguntaTest::all()->where('id_test', $test->id)->shuffle();

        // Contamos el número de preguntas de la encuesta.
        $numeroPreguntas = $preguntasTest->count();

        // Retornamos la vista que muestra la encuesta a realizar junto con los datos de la misma.
        return view('admin.test', compact('preguntasTest', 'test', 'numeroPreguntas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show_see($slug, $vez)
    {
        
        $test = Test::all()->where('uuid', $slug)->first();
        $bien = 0;
        $mal = 0;
        $numeroVotacion = 0;

        
        // Buscamos y recogemos las preguntas de la encuesta en cuestión.
        $preguntasTest = PreguntaTest::all()->where('id_test', $test->id)->shuffle();
        
        // Contamos el número de preguntas de la encuesta.
        $numeroPreguntas = $preguntasTest->count();
        
        $messages = [];

        $numeroRespuestas = RespuestasTestUsuario::all()->where('n_test', $test->id);
        $respuestasUsuario = $test->respuestasTest->where('id_usuario', auth()->user()->id)->where('n_test', $test->id)->where('n_votacion',$vez);

        
        foreach ($test->preguntasTests as $value) {

            $respuestaTest = RespuestaTest::all()->where('id_pregunta', $value->id);
            
            foreach ($respuestaTest as $valor) {

                foreach ($respuestasUsuario as $respuesta) {
                
                    if($valor->id == $respuesta->id_respuesta){
                        if($valor->correcta == 1){
                            $bien = $bien + 1;
                            //$messages = Arr::add($messages, 'buena'.$valor->id, 'text-success');
                            session()->flash('buena'.$valor->id, 'text-success');
                        }elseif($valor->correcta != 1){
                            $mal = $mal + 1;
                            //$messages = Arr::add($messages, 'error'.$valor->id, 'text-danger');
                            session()->flash('error'.$valor->id, 'text-danger');
                        }                           
                    }
                }              
            }
        }

        // Sumamos el total de preguntas que hay.
        $total = $bien + $mal;

        // Si las que están bien son superiores a las que están mal
        if((int)($bien * 0.90) >= (int)($total * 0.90)){
            $tipoMensaje = "puntuacion-aprobado";
            $mensaje = "¡Aprobaste el test, enhorabuena!";
        }else{
            $tipoMensaje = "puntuacion-suspenso";
            $mensaje = "¡No superaste el test, inténtalo de nuevo!";
        }
        
        //$messages = Arr::add($messages, $tipoMensaje, 'Tu puntuación es de '.$bien);
        //dd($messages);
        //session()->flash($messages);

        session()->flash($tipoMensaje, $mensaje);

        // Retornamos la vista que muestra la encuesta a realizar junto con los datos de la misma.
        return view('admin.test', compact('preguntasTest', 'test', 'numeroPreguntas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
