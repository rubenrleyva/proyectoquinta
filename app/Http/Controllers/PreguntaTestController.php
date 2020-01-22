<?php

namespace App\Http\Controllers;

use App\PreguntaTest;
use App\RespuestaTest;
use App\Foto;
use App\Test;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PreguntaTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $test = Test::find($id);
        $preguntas = PreguntaTest::all()->where('id_test', $id);
        // retornamos la vista a la creación Usuarios.
        return view('admin.mostrarpreguntastests')->with('preguntas', $preguntas)->with('test', $test);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $test = Test::find($id);
        // retornamos la vista a la creación Usuarios.
        return view('admin.crearpreguntatest')->with('test', $test);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $test = Test::find($request['id']);
        $pregunta =  PreguntaTest::where(['pregunta' => $request['pregunta'], 'id_test' => $request['id']])->first();

        if($request->file('foto')){

            $tipo = "test";

            // elegimos el nombre del archivo y su ubicación
            $path = 'img/'.$tipo.'/'.Str::random(30).'.'.$request->file('foto')->extension();

            // le pasamos la imagen, el tamaño y guardamos
            Image::make($request->file('foto'))
            ->resize(200, 150, function ($constraint) {
                $constraint->upsize();
            })->save($path, 80);

            // creamos una nueva foto y le pasamos la URL
            $foto = Foto::create([
                'url_foto' => $path,
                'tipo_foto' => $tipo,
            ]);

            $idFoto = $foto->id;

        }else{

            $idFoto = null;
        }

        
        if($pregunta == null){
            $preguntaNueva = PreguntaTest::create([
                'id_test' => $request['id'],
                'tipo' => $test->permiso,
                'pregunta' => $request['pregunta'],
                'id_foto' => $idFoto,
            ]);
        }else{
            $preguntaNueva = PreguntaTest::create([
                'id_test' => $request['id'],
                'tipo' => $test->permiso,
                'pregunta' => $request['pregunta'],
                'id_foto' => $idFoto,
            ]);
        }

        for ($i=1; $i <= 3; $i++) { 

            $checkbox = $request['respuesta-check'.$i];

            if($checkbox == "on"){
                $respuesta = 1;
            }else{
                $respuesta = 0;
            }

            RespuestaTest::create([
                'id_pregunta' => $preguntaNueva->id,
                'respuesta' => $request['respuesta'.$i],
                'correcta' => $respuesta,
            ]);

        }

        $mensaje = 'La pregunta ha sido creada.';


        return redirect()->route('admin.mostrarpreguntastests', compact('test', $test))->with('respuesta', $mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PreguntaTest  $preguntaTest
     * @return \Illuminate\Http\Response
     */
    public function show(PreguntaTest $preguntaTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id La id de la pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta = PreguntaTest::find($id);
        $test = Test::find($pregunta->id_test);
        $respuestas = RespuestaTest::all()->where('id_pregunta', $id);
        
        for ($i=0; $i < count($respuestas); $i++) {      
            ${"respuesta".($i+1)} = $respuestas[$i];
        }

        // retornamos la vista a la creación Usuarios.
        return view('admin.crearpreguntatest')->with('test', $test)->with('pregunta', $pregunta)->with('respuesta1', $respuesta1)->with('respuesta2', $respuesta2)->with('respuesta3', $respuesta3);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PreguntaTest  $preguntaTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreguntaTest $preguntaTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param $id la id de la pregunta.
     */
    public function destroy($id)
    {
        $pregunta = PreguntaTest::find($id);
        $id = $pregunta->id_test;

        // En caso de ser Administradores
        if (auth()->user()->tipousuario == 1) {
            $preguntas = PreguntaTest::all()->where('id_test', $pregunta->id_test);
            $pregunta->delete();
            // devolvemos un mensaje.
            $respuesta = 'La pregunta ha sido elimianada.';
        } else {

            // devolvemos un mensaje.
            $respuesta = 'No puedes borrar la pregunta, elige otra opción de tu menú.';
        }

        // retornamos la ruta de muestra de usuarios.
        //return redirect()->route('admin.encuestas', compact('id'));
        return redirect()->route('admin.mostrarpreguntastest', $id);
    }
}
