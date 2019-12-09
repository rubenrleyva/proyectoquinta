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
                    @if (isset($respuestas))
                        <form name="editarrespuesta" method="POST" action="{{ route('admin.guardarespuestaeditada.editar', ['id'=>$pregunta->id]) }}">
                    @else
                        <form name="crearrespuesta" method="POST" action="{{ route('admin.guardarespuestaencuesta.guardar', ['id'=>$pregunta->id]) }}">  
                    @endif
                        @csrf
                        <div class="form-group row">
                            <label for="titulo" class="col-md-12 col-form-label text-center">Encuesta: {{ __($pregunta->titulo) }}</label>
                        </div>
                        @if (isset($respuestas))
                            @foreach ($respuestas as $respuesta)
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for='pregunta{{$respuesta->numero}}' class='col-md-12 col-form-label text-right'>Pregunta</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input id='preguntanumero{{$respuesta->numero}}' type='text' class='form-control @error('preguntanumero{{$respuesta->numero}}') is-invalid @enderror' name='preguntanumero{{$respuesta->numero}}' value="@if (isset($respuesta)){{ old('preguntanumero', $respuesta->numero) }}@endif" autocomplete='preguntanumero{{$respuesta->numero}}' placeholder='Nº' autofocus>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="pregunta{{$respuesta->numero}}" type="text" class="form-control @error('pregunta{{$respuesta->numero}}') is-invalid @enderror" name="pregunta{{$respuesta->numero}}" value="@if (isset($respuesta)){{ old('pregunta', $respuesta->pregunta) }}@endif" required autocomplete="pregunta{{$respuesta->numero}}">
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn color wow fadeInLeft" href="{{ route('admin.borrarespuestaencuesta.borrar', $respuesta->id) }}" method="get" style="display: inline" onclick="return confirm('¿Quieres borrar la respuesta?')" ><i class="icofont icofont-close"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div id="nuevasRespuestas"></div>
                        
                        <div class="form-group row mt-5">
                            <div class="col-md-12 offset-md-12 text-center mb-5">
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
                                    @if (Request::is('editarespuestasencuesta/*'))
                                        {{ __('Editar respuestas') }}
                                    @else
                                        {{ __('Guardar respuestas') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../preguntasencuesta" class="btn color wow fadeInLeft">Volver</a>
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
