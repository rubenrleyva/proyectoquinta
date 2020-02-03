<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\User;
use App\Foto;
use App\Test;
use App\RespuestasTestUsuario;
use App\RespuestaTest;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Clase Controlador encargada de controlar las páginas del sitio.
 * Versión 1 01/12/2019
 */
class PaginaController extends Controller
{
    /**
     * Función encargada de mostrar la página principal del sitio web.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recogemos todos los valores de los permisos del sistema.
        $servicios = Servicio::all();

        // Contamos el número de alumnos del sistema.
        $alumnos = User::all()->where('tipousuario', 2)->count();

        // Recogemos todos los valores de las fotos del sistema.
        $fotos = Foto::all();

        // Recogemos todos los valores de usuarios del sistema.
        $usuarios = User::all();

        // Contamos si existe algún comentario.
        $comentarios = User::all()->where('comentario' != null);

        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido', compact('servicios', 'usuarios', 'alumnos', 'fotos', 'comentarios'));
    }

    /**
     * Función encargada de mostrar la página de contacto del sitio web.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacto()
    {
        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido');
    }

    /**
     * Función encargada de mostrar la página de contacto del sitio web.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicios()
    {

        // Recogemos el valor de los permisos
        $servicios = Servicio::all();

        $servicios = $servicios->shuffle();

        $servicios->all();

        // Retornamos los valores y se los pasamos a una vista.
        return view('bienvenido', compact('servicios'));
    }

    /**
     * Función encargada de mostrar la página de inicio.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.inicio');
    }

    /**
     * Función encargada de mostrar la página de inicio.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuariotest()
    {

        // Buscamos el usuario que está viendo los test
        $usuario = auth()->user();

        // Buscamos todos los test para mostralos
        $tests = Test::all();

        // Buscamos todas las respuestas que haya dado el usuario
        $respuestas = RespuestasTestUsuario::all()->where('id_usuario', $usuario->id);

        // Resultados
        $resultados = [];

        // El número de veces que se ha realizado el test
        $vecesRespondido = 0;

        $final = [];
        $flattened = [];
        $flattened_1 = [];
        // $otro = [];

        // Recorremos todos los test que hay en el sistema
        foreach ($tests as $key => $test) {

            $array1 = [];
            $array2 = [];
            $array3 = [];
            $array4 = [];
            $arrayPreguntas = [];
            $total = 0;

            // Guardamos el id del test en un array.
            $array1 = Arr::add($resultados, 'id_test'.$test->id, $test->id);

            // Comprobamos las veces que se ha realizado el test
            $vecesRespondido = $tests[$key]->respuestasTest->where('id_usuario', $usuario->id)->where('n_test', $test->id)->max('n_votacion');

            // Sacamos los id's de las preguntas
            $idPreguntas = $tests[$key]->respuestasTest->where('id_usuario', $usuario->id)->where('n_test', $test->id);
            
            foreach ($idPreguntas as $value) {
                array_push($arrayPreguntas, $value->id_pregunta);
            }

            $flattened = Arr::add($array1, 'respondido', $vecesRespondido);

            //dd($array1);

            for ($i=1; $i <= $vecesRespondido; $i++) { 

                // Ponemos los contadores a 0
                $bien = 0;
                $mal = 0;    

                // Borramos los arrays
                $array2 = '';
                $array3 = '';
                $array4 = '';

                // Guardamnos el valor de las veces que ha sido respondido
                // $array2 = Arr::add($resultados, 'respondido'.($i + 1), $i + 1);

                // Sacamos las respuestas del usuario al test dando igual el número de votación
                $respuestasUsuario = $test->respuestasTest->where('id_usuario', $usuario->id);

                // Sacamos las respuestas del test
                $respuestaTest = RespuestaTest::all()->whereIn('id_pregunta', $arrayPreguntas);

                // Recorremos las respuestas del test
                foreach ($respuestaTest as $valor) {  

                    // Recorremos las respuestasa del usuario
                    foreach ($respuestasUsuario as $key => $value) {

                        // Si la respuesta concuerda con su número de votación
                        if ($i == $respuestasUsuario[$key]->n_votacion) {

                            $flattened = Arr::add($flattened, 'fecha'.$i, $value->created_at);

                            // y el valor de la respuesta es igual al respuesta del usuario
                            if($valor->id == $value->id_respuesta){

                                // Comprobamos si es correcta
                                if($valor->correcta == 1){

                                    // y sumamos
                                    $bien = $bien + 1;

                                // en caso contrario
                                }elseif($valor->correcta != 1){

                                    // restamos
                                    $mal = $mal + 1;

                                }                           
                            }
                        } 
                    }
                   
                    // Sumamos el total de preguntas que hay.
                    $total = $bien + $mal;

                    // Si las que están bien son superiores a las que están mal
                    if((int)($bien * 0.90) >= (int)($total * 0.90)){
                        $estado = 1;
                    }else{
                        $estado = 0;
                    }
                    
                    // Agregamos los arrays
                    $array3 = Arr::add($resultados, 'bien', $bien);
                    $array4 = Arr::add($array3, 'mal', $mal);       
                    $array5 = Arr::add($array4, 'estado', $estado);       

                }             
                
                // Resultado final
                $flattened = Arr::add($flattened, 'respuestas'.$i, $array5);
                //dd($flattened);
                
            }
            

            // Final último.
            $flattened_1 = Arr::add($flattened_1, 'test'.$test->id, $flattened);
            //dd($flattened_1);
        }

        
        $final = Arr::dot($flattened_1);  

        //dd($usuario->pago);

        //dd($final);
        
        // Retornamos los valores y se los pasamos a una vista.
        return view('admin.usuario', compact(['usuario', $usuario],['tests', $tests], ['final', $final]));
    }
}
