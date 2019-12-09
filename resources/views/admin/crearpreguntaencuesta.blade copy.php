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
                    @if (isset($preguntas))
                        <form name="editarpregunta " method="POST" action="{{ route('admin.guardarpreguntaeditada.editar', ['id'=>$encuesta->id]) }}">
                    @else
                        <form name="crearpregunta " method="POST" action="{{ route('admin.guardarpreguntaencuesta.guardar', ['id'=>$encuesta->id]) }}">  
                    @endif
                        @csrf
                        <div class="form-group row">
                            <label for="titulo" class="col-md-12 col-form-label text-center">Encuesta: {{ __($encuesta->titulo) }}</label>
                        </div>
                        @if (isset($preguntas))
                            @foreach ($preguntas as $pregunta)
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for='pregunta{{$pregunta->numero}}' class='col-md-12 col-form-label text-right'>Pregunta</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input id='preguntanumero{{$pregunta->numero}}' type='text' class='form-control @error('preguntanumero{{$pregunta->numero}}') is-invalid @enderror' name='preguntanumero{{$pregunta->numero}}' value="@if (isset($pregunta)){{ old('preguntanumero', $pregunta->numero) }}@endif" autocomplete='preguntanumero{{$pregunta->numero}}' placeholder='Nº' autofocus>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="pregunta{{$pregunta->numero}}" type="text" class="form-control @error('pregunta{{$pregunta->numero}}') is-invalid @enderror" name="pregunta{{$pregunta->numero}}" value="@if (isset($pregunta)){{ old('pregunta', $pregunta->pregunta) }}@endif" required autocomplete="pregunta{{$pregunta->numero}}">
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn color wow fadeInLeft" href="{{ route('admin.borrarpreguntaencuesta.borrar', $pregunta->id) }}" method="get" style="display: inline" onclick="return confirm('¿Quieres borrar la pregunta?')" ><i class="icofont icofont-close"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div id="nuevasPreguntas"></div>
                        
                        <div class="form-group row mt-5">
                            <div class="col-md-12 offset-md-12 text-center mb-1">
                                <a id="nuevaPregunta" class="btn color wow fadeInLeft">
                                    {{ __('Añadir pregunta') }}
                                </a>
                                <a id="borrarPregunta" class="btn color wow fadeInLeft">
                                    {{ __('Borrar pregunta') }}
                                </a>
                            </div>
                        </div>

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarpreguntaencuesta/*'))
                                        {{ __('Editar preguntas') }}
                                    @else
                                        {{ __('Guardar preguntas') }}
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
            nuevaPreguntasEncuesta();
        });
    </script>
@endpush
