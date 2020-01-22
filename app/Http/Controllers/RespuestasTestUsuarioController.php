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
        $suma = 0;
        $messages = [];

        $numeroRespuestas = RespuestasTestUsuario::all()->where('n_test', $id);

        dd($numeroRespuestas);
        foreach ($test->preguntasTests as $key => $value) {
            $key = $key + 1;
            $respuestaTest = RespuestaTest::all()->where('id_pregunta',$value->id);

            $nuevaRespuesta = RespuestasTestUsuario::create([
                'n_test' => $id,
                'n_votacion' => 1,
            ]);

            foreach ($respuestaTest as $valor) {
                if($valor->id == $request['pregunta'.$key]){
                    if($valor->correcta == 1){
                        $suma = $suma + 1;
                        $nuevaRespuesta->id_pregunta = $valor->id_pregunta;
                        $nuevaRespuesta->id_respuesta = $valor->id;
                        $messages = Arr::add($messages, 'buena'.$valor->id, 'text-success');
                    }elseif($valor->correcta != 1){
                        $nuevaRespuesta->id_pregunta = $valor->id_pregunta;
                        $nuevaRespuesta->id_respuesta = $valor->id;
                        $messages = Arr::add($messages, 'error'.$valor->id, 'text-danger');
                    }                           
                }
            }

            $nuevaRespuesta->update();
        }

        if($suma > 0){
            $tipoMensaje = "puntuacion-aprobado";
        }else{
            $tipoMensaje = "puntuacion-suspenso";
        }

        $messages = Arr::add($messages, $tipoMensaje, 'Tu puntuación es de '.$suma);

        //dd($messages);

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
