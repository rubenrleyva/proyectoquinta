@extends('admin.bienvenido')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (session()->has('respuesta'))
                    <div class="alert alert-success text-center">
                        {{ session('respuesta') }}
                    </div>
                @endif
                <div class="card-body">
                    @if (isset($pregunta))
                        <form name="editarpregunta " method="POST" action="{{ route('admin.guardarpreguntaeditada.editar', ['id'=>$encuesta->id]) }}">
                    @else
                        <form name="crearpregunta " method="POST" action="{{ route('admin.guardarpreguntaencuesta.guardar', ['id'=>$encuesta->id]) }}">  
                    @endif
                        @csrf
                        <div class="form-group row">
                            <label for="titulo" class="col-md-12 col-form-label text-center">Nombre encuesta: {{ __($encuesta->titulo) }}</label>
                        </div>
                        <div class="form-group row mb-5">
                            <input id='id_pregunta' type='hidden' name='id_pregunta' value='@if (isset($pregunta)){{ old('id_pregunta', $pregunta->id) }}@endif'>
                            <div class=" card col-md-2">
                                <label for='pregunta' class='col-md-12 col-form-label text-center'>Pregunta</label>
                            </div>
                            <div class="col-md-1">
                                <input id='numero' type='text' class='form-control text-center @error('numero') is-invalid @enderror' name='numero' value="@if (isset($pregunta)){{ old('numero', $pregunta->numero) }}@endif" autocomplete='numero' placeholder='Nº' autofocus>
                            </div>
                            <div class="col-md-7">
                                <input id="pregunta" type="text" class="form-control @error('pregunta') is-invalid @enderror" name="pregunta" value="@if (isset($pregunta)){{ old('pregunta', $pregunta->pregunta) }}@endif" required autocomplete="pregunta">
                            </div>
                            <div class="col-md-2">
                                <select id="tipo" name="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                                    <option value='1' @if ((isset($encuesta) && $encuesta->tipo == 1)){{ old('tipo', 'selected') }}@endif>Simple</option>
                                    <option value='2' @if ((isset($encuesta) && $encuesta->tipo == 2)){{ old('tipo', 'selected') }}@endif>Múltiple</option>     
                                </select>
                            </div>
                        </div>
                        @if (isset($respuestas))
                            @foreach ($respuestas as $respuesta)
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for='respuesta{{$respuesta->numero}}' class='col-md-12 col-form-label text-right'>Respuesta</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input id="respuesta{{$respuesta->numero}}" type="text" class="form-control @error('respuesta{{$respuesta->numero}}') is-invalid @enderror" name="respuesta{{$respuesta->numero}}" value="@if (isset($respuesta)){{ old('respuesta', $respuesta->respuesta) }}@endif" required autocomplete="respuesta{{$pregunta->respuesta}}">
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn color wow fadeInLeft" href="{{ route('admin.borrarencuesta.borrar', $respuesta->id) }}" method="get" style="display: inline" onclick="return confirm('¿Quieres borrar la respuesta?')" ><i class="icofont icofont-close"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div id="nuevasRespuestas" class="mt-3"></div>
                        
                        <div class="form-group row mt-5">
                            <div class="col-md-12 offset-md-12 text-center mb-1">
                                <a id="nuevaRespuesta" class="btn color wow fadeInLeft">
                                    {{ __('Añadir respuesta') }}
                                </a>
                                <a id="borrarRespuesta" class="btn color wow fadeInLeft">
                                    {{ __('Borrar respuesta') }}
                                </a>
                            </div>
                        </div>

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarpreguntaencuesta/*'))
                                        {{ __('Editar pregunta') }}
                                    @else
                                        {{ __('Guardar pregunta') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../encuestas" class="btn color wow fadeInLeft">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripttablas')
    <script src="/js/quintamarcha.js"></script>
    <script>
        $(window).on("load", function() {
            nuevaRespuestasEncuesta();
        });
    </script>
@endpush
