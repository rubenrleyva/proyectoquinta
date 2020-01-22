@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($encuesta)
    <div class="row-fluid">
        <div class="col-12">  
            @if (session()->has('respuesta'))
            <div class="alert alert-success wow fadeInLeft text-center">
                {{ session('respuesta') }}
            </div>
            @endif
            <form name="responderencuesta" method="POST" action="{{ route('admin.editarrespuestaencuesta.editar', ['id'=>$encuesta->id]) }}">
                @csrf
                @foreach ($preguntasEncuesta as $clave => $pregunta)
                <section class="row">
                    <div class="card fd-i w-100 mb-3">
                        <div class="card-header d-flex align-items-center w-25">
                            {{ $preguntasEncuesta[$clave]->numero }} - {{ $preguntasEncuesta[$clave]->pregunta }}  @if($pregunta->tipo == 2) (Puede escoger varías opciones) @endif
                        </div>
                        <div class="card-body">
                            <div class="form-check required">
                                @foreach ($pregunta->respuesta as $respuesta)
                                    <ul>
                                        <input class="form-check-input" @if($respuesta->tipo == 1) type="radio" @else type="checkbox" @endif name="pregunta{{ $respuesta->id_pregunta }}@if($respuesta->tipo == 2)[] @endif" value="{{ $respuesta->id }}" required>
                                        <label class="form-check-label" for="pregunta{{ $respuesta->id_pregunta }}">
                                            {{ $respuesta->respuesta }}
                                        </label>
                                    </ul>
                                @endforeach
                            </div>
                        </div>  
                    </div>
                </section>
                @endforeach
                <div class="form-group row col-md-offset-1">
                    <div class="col-md-4 offset-md-4 text-center mb-1">
                        <button type="submit" class="btn color wow fadeInLeft">
                            {{ __('Finalizar') }}
                        </button>
                    </div>
                    <div class="col-md-4 offset-md-4 text-center">
                        <a href="../encuestas" class="btn color wow fadeInLeft">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection

