<?php

namespace App\Http\Controllers;
use App\Encuesta;
use App\RespuestaEncuestas;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class RespuestaEncuestasController extends Controller
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
     * @param  \App\RespuestaEncuestas  $respuestaEncuestas
     * @return \Illuminate\Http\Response
     */
    public function show(RespuestaEncuestas $respuestaEncuestas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RespuestaEncuestas  $respuestaEncuestas
     * @return \Illuminate\Http\Response
     */
    public function edit(RespuestaEncuestas $respuestaEncuestas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RespuestaEncuestas  $respuestaEncuestas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $filtro = Arr::except($request, ['_token']);
        
        foreach ($filtro->request as $valor) {
            if(is_array($valor)){
                foreach ($valor as $val) {
                    $respuesta = RespuestaEncuestas::find($val);
                    $respuesta->votada = $respuesta->votada + 1 ;
                    $respuesta->update();
                }
            }else{
                $respuesta = RespuestaEncuestas::find($valor);
                $respuesta->votada = $respuesta->votada + 1 ;
                $respuesta->update();
            }
            
        }

        $encuesta = Encuesta::find($request['id']);
        $encuesta->votada = $encuesta->votada + 1;
        $encuesta->update();

        return redirect()->route('admin.mostrarencuestas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RespuestaEncuestas  $respuestaEncuestas
     * @return \Illuminate\Http\Response
     */
    public function destroy(RespuestaEncuestas $respuestaEncuestas)
    {
        //
    }
}
