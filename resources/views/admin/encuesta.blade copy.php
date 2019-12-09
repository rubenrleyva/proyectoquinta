@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($encuesta)
    <div class="row-fluid">
        <div class="col-12">
            <div class="card">
                @if (session()->has('respuesta'))
                <div class="alert alert-success wow fadeInLeft text-center">
                {{ session('respuesta') }}
                </div>
                @endif
                <form name="responderencuesta" method="POST" action="{{ route('admin.editarrespuestaencuesta.editar', ['id'=>$encuesta->id]) }}">
                    @csrf
                    @foreach ($preguntasEncuesta as $clave => $pregunta)
                        <div class="card-body">
                            <div class="card mb-3" style="">
                                <div class="row no-gutters">
                                    <div class="col-md-4 d-flex align-self-center align-items-center">
                                        <h5 class="card-title d-flex align-self-center ">{{ $clave + 1 }} - {{ $pregunta->pregunta }}  @if($pregunta->tipo == 2) (Puede escoger varías opciones) @endif</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="form-check">
                                                @foreach ($pregunta->respuesta as $respuesta)
                                                    <ul>
                                                        <input class="form-check-input" @if($respuesta->tipo == 1) type="radio" @else type="checkbox" @endif name="pregunta{{ $respuesta->id_pregunta }}@if($respuesta->tipo == 2)[] @endif" id="pregunta{{ $respuesta->id_pregunta }}" value="{{ $respuesta->id }}">
                                                        <label class="form-check-label" for="pregunta{{ $respuesta->id_pregunta }}">
                                                            {{ $respuesta->respuesta }}
                                                        </label>
                                                    </ul>
                                                @endforeach 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    {{ __('Responder') }}
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../encuesta" class="btn color wow fadeInLeft">Volver</a>
                            </div>
                        </div>
                </form> 
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

