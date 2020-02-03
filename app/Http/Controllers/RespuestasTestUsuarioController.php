<?php

namespace App\Http\Controllers;

use App\Test;
use App\RespuestasTestUsuario;
use App\RespuestaTest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RespuestasTestUsuarioController extends Controller
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
     * @param  \App\RespuestasTestUsuario  $respuestasTestUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(RespuestasTestUsuario $respuestasTestUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RespuestasTestUsuario  $respuestasTestUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RespuestasTestUsuario  $respuestasTestUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $test = Test::find($id);
        $bien = 0;
        $mal = 0;
        $numeroVotacion = 0;
        $messages = [];

        $numeroRespuestas = RespuestasTestUsuario::all()->where('n_test', $id);
        $numeroVotacion = $test->respuestasTest->where('id_usuario', auth()->user()->id)->where('n_test', $id)->max('n_votacion');

        foreach ($test->preguntasTests as $key => $value) {

            $key = $key + 1;
            $respuestaTest = RespuestaTest::all()->where('id_pregunta', $value->id);
            
            $nuevaRespuesta = RespuestasTestUsuario::create([
                'n_test' => $id,
                'n_votacion' => $numeroVotacion + 1,
                'id_usuario' => auth()->user()->id,
            ]);

            foreach ($respuestaTest as $key => $valor) {
                if($valor->id == $request['pregunta'.$valor->id_pregunta]){
                    if($valor->correcta == 1){
                        $bien = $bien + 1;
                        $nuevaRespuesta->id_pregunta = $valor->id_pregunta;
                        $nuevaRespuesta->id_respuesta = $valor->id;
                        $messages = Arr::add($messages, 'buena'.$valor->id, 'text-success');
                    }elseif($valor->correcta != 1){
                        $mal = $mal + 1;
                        $nuevaRespuesta->id_pregunta = $valor->id_pregunta;
                        $nuevaRespuesta->id_respuesta = $valor->id;
                        $messages = Arr::add($messages, 'error'.$valor->id, 'text-danger');
                    }                           
                }
            }

            $nuevaRespuesta->update();
        }

        // Sumamos el total de preguntas que hay.
        $total = $bien + $mal;

        // Si las que están bien son superiores a las que están mal
        if((int)($bien * 0.90) >= (int)($total * 0.90)){
            $tipoMensaje = "puntuacion-aprobado";
        }else{
            $tipoMensaje = "puntuacion-suspenso";
        }


        $test->realizado = $test->realizado + 1;
        $test->update();

        $messages = Arr::add($messages, $tipoMensaje, 'Tu puntuación es de '.$bien);

        // Retornamos los valores y se los pasamos a una vista.
        return redirect()->back()->with($messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RespuestasTestUsuario  $respuestasTestUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(RespuestasTestUsuario $respuestasTestUsuario)
    {
        //
    }
}
