@extends('admin.bienvenido')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card py-3">
                <div class="card-body">
                    @if (isset($encuesta))
                        <form name="editarencuesta" method="POST" action="{{ route('admin.guardarencuestaeditado.guardar', ['encuesta'=>$encuesta]) }}">
                    @else
                         <form name="crearencuesta" method="POST" action="{{ route('admin.guardarencuesta.guardar') }}">
                    @endif
                        @csrf
                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label align-middle text-right">{{ __('Título') }}</label>
                            <div class="col-md-4">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="@if (isset($encuesta)){{ old('titulo', $encuesta->titulo) }}@endif" required autocomplete="titulo" autofocus>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if (isset($preguntasEncuesta))
                             @foreach ($preguntasEncuesta as $pregunta)
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for='pregunta{{$pregunta->numero}}' class='col-md-4 col-form-label text-right'>Pregunta</label>
                                        <input id="preguntanumero{{$pregunta->numero}}" type="text" class="form-control @error('preguntanumero{{$pregunta->numero}}') is-invalid @enderror" name="preguntanumero{{$pregunta->numero}}" value="@if (isset($pregunta)){{ old('preguntanumero', $pregunta->pregunta) }}@endif" required autocomplete="preguntanumero{{$pregunta->numero}}">
                                    </div>
                                    <div class="col-md-6">
                                        <input id="pregunta{{$pregunta->numero}}" type="text" class="form-control @error('pregunta{{$pregunta->numero}}') is-invalid @enderror" name="pregunta{{$pregunta->numero}}" value="@if (isset($pregunta)){{ old('pregunta', $pregunta->pregunta) }}@endif" required autocomplete="pregunta{{$pregunta->numero}}">
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarencuesta/*'))
                                        {{ __('Editar encuesta') }}
                                    @else
                                        {{ __('Añadir encuesta') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../encuestas" class="btn color wow fadeInLeft">Cancelar</a>
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
            nuevaRespuestasEncuesta();          
        });
    </script>
@endpush
