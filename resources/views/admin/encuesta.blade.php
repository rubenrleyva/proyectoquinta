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
                    <div class="accordion mb-3" id="accordionExample">
                        <div class="card">
                            <div class="card-header">               
                                @foreach ($preguntasEncuesta as $clave => $pregunta)
                                     <a class="btn btn-link color wow fadeInLeft" type="button" data-toggle="collapse" aria-expanded="true" data-target="#collapse_{{ $preguntasEncuesta[$clave]->numero }}">{{$preguntasEncuesta[$clave]->numero}}</a>        
                                @endforeach
                            </div>
                        </div>
                        <div class="card">
                            @foreach ($preguntasEncuesta as $clave => $pregunta)
                                <div id="collapse_{{ $preguntasEncuesta[$clave]->numero }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card text-center">
                                        <div class="card-header">     
                                        {{ $preguntasEncuesta[$clave]->numero }} - {{ $preguntasEncuesta[$clave]->pregunta }}  @if($pregunta->tipo == 2) (Puede escoger varías opciones) @endif
                                    </div>
                                        <div class="card-body">
                                            <div class="col-md-12">
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
                        </div>
                    </div>                    
                    <div class="form-group row col-md-offset-1">
                        <div class="col-md-4 offset-md-4 text-center mb-1">
                            <button type="submit" class="btn color wow fadeInLeft">
                                {{ __('Responder') }}
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
    @endif
</div>
@endsection

