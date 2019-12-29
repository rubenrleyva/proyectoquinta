<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Controlamos la página principal.
Route::get('/', 'PaginaController@index');
Route::get('/contacto', 'PaginaController@contacto');
Route::get('/info-servicios', 'PaginaController@servicios');
Route::get('/inicio', 'PaginaController@inicio')->middleware('auth');

/*
Route::get('/inicio', function () {
    return view('inicio');
})->middleware('auth');*/

Route::middleware(['auth', 'role'])->group(function () {

    // Rutas de uso para los usuarios
    Route::get('usuarios', 'UserController@index')->name('admin.mostrarusuarios');
    Route::get('crearusuario', 'UserController@create')->name('admin.crearusuario');
    Route::post('guardarusuario/{usuario?}', 'UserController@store')->name('admin.guardarusuario.guardar');
    Route::get('editarusuario/{usuario}', 'UserController@edit')->name('admin.editarusuario.editar');
    Route::post('guardarusuarioeditado/{usuario?}', 'UserController@update')->name('admin.actualizarusuarioeditado.guardar');
    Route::delete('borrarusuario/{usuario}', 'UserController@destroy')->name('admin.borrarusuario.borrar');

    // Rutas de uso para las clases prácticas
    Route::get('clasespracticas', 'ClaseController@index')->name('admin.mostrarclases');
    Route::get('crearclase', 'ClaseController@create')->name('admin.crearclase');
    Route::post('guardarclase/{clase?}', 'ClaseController@store')->name('admin.guardarclase.guardar');
    Route::post('guardarclaseeditado/{clase?}', 'ClaseController@update')->name('admin.guardarclaseeditado.guardar');

    // Rutas de uso para las fotos
    Route::get('fotos', 'FotoController@index')->name('admin.mostrarfotos');
    Route::get('crearfoto', 'FotoController@create')->name('admin.crearfoto');
    Route::post('guardarfoto/{foto?}', 'FotoController@store')->name('admin.guardarfoto.guardar');
    Route::get('editarfoto/{foto}', 'FotoController@edit')->name('admin.editarfoto.editar');
    Route::post('guardarfotoeditado/{foto?}', 'FotoController@update')->name('admin.guardarfotoeditado.guardar');
    Route::delete('borrarfoto/{foto}', 'FotoController@destroy')->name('admin.borrarfoto.borrar');

    // Rutas correspondientes a los permisos
    Route::get('servicios', 'ServicioController@index')->name('admin.mostrarservicios');
    Route::get('crearservicio', 'ServicioController@create')->name('admin.crearservicio');
    Route::post('guardarservicio/{servicio?}', 'ServicioController@store')->name('admin.guardarservicio.guardar');
    Route::get('editarservicio/{servicio}', 'ServicioController@edit')->name('admin.editarservicio.editar');
    Route::post('guardarservicioeditado/{servicio?}', 'ServicioController@update')->name('admin.guardarservicioeditado.guardar');
    Route::delete('borrarservicio/{servicio?}', 'ServicioController@destroy')->name('admin.borrarservicio.borrar');

    // Rutas correspondientes a los pagos
    Route::get('pagos', 'PagoController@index')->name('admin.mostrarpagos');
    Route::get('crearpago', 'PagoController@create')->name('admin.crearpago');
    Route::post('guardarpago/{pago?}', 'PagoController@store')->name('admin.guardarpago.guardar');
    Route::get('editarpago/{pago}', 'PagoController@edit')->name('admin.editarpago.editar');

});




// Rutas correspondientes a las encuestas I
Route::get('encuestas', 'EncuestaController@index')->name('admin.mostrarencuestas')->middleware('auth');
Route::get('crearencuesta', 'EncuestaController@create')->name('admin.crearencuesta')->middleware('auth');
Route::post('guardarencuesta/{encuesta?}', 'EncuestaController@store')->name('admin.guardarencuesta.guardar')->middleware('auth');
Route::get('editarencuesta/{encuesta}', 'EncuestaController@edit')->name('admin.editarencuesta.editar')->middleware('auth');
Route::post('guardarencuestaeditado/{encuesta?}', 'EncuestaController@update')->name('admin.guardarencuestaeditado.guardar')->middleware('auth');
Route::delete('borrarencuesta/{encuesta}', 'EncuestaController@destroy')->name('admin.borrarencuesta.borrar')->middleware('auth');

// Rutas correspondientes a las preguntas de las encuestas
Route::get('preguntasencuestas/{encuesta?}', 'PreguntaEncuestaController@index')->name('admin.mostrarpreguntasencuestas')->middleware('auth');
Route::get('crearpreguntaencuesta/{encuesta?}', 'PreguntaEncuestaController@create')->name('admin.crearpreguntaencuesta')->middleware('auth');
Route::post('guardarpreguntaencuestas/{pregunta?}', 'PreguntaEncuestaController@store')->name('admin.guardarpreguntaencuesta.guardar')->middleware('auth');
Route::get('editarpreguntaencuesta/{encuesta?}', 'PreguntaEncuestaController@edit')->name('admin.editarpreguntaencuesta.editar')->middleware('auth');
Route::post('guardarpreguntaeditada/{pregunta?}', 'PreguntaEncuestaController@update')->name('admin.guardarpreguntaeditada.editar')->middleware('auth');
Route::delete('borrarpreguntaencuesta/{pregunta?}', 'PreguntaEncuestaController@destroy')->name('admin.borrarpreguntaencuesta.borrar')->middleware('auth');

// Rutas para las fotos
// Route::get('borrarfoto/{id}', 'FotoController@destroy')->name('admin.borrarfoto.borrar')->middleware('auth');

// Rutas correspondientes a las respuestas
Route::post('responderencuesta/{respuestas?}', 'RespuestaEncuestasController@update')->name('admin.editarrespuestaencuesta.editar')->middleware('auth');


// Rutas correspondientes a las encuestas II
Route::get('encuesta/{slug?}', ['as' => 'encuesta', 'uses' => 'EncuestaController@show']);
//Route::get('encuesta/{encuesta?}', 'EncuestaController@show')->name('admin.encuesta')->middleware('auth');



// Registration Routes...
if ($options['register'] ?? true) {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

}

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
