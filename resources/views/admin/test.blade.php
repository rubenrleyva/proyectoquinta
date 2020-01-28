@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($test)
    <div class="row-fluid">
        <div class="col-12">  
            @if (session()->has('respuesta'))
            <div class="alert alert-success wow fadeInLeft text-center">
                {{ session('respuesta') }}
            </div>
            @endif
            <form name="respondertest" method="POST" action="{{ route('admin.editarrespuestatest.guardar', $test) }}">
                @csrf
                @foreach ($preguntasTest as $clave => $pregunta)
                <section class="row">
                    <div class="card fd-i w-100 mb-3">
                        <div class="card-header d-flex align-items-center">
                            @if (isset($preguntasTest[$clave]->foto))
                                <img class="card-img-top" src="/{{ $preguntasTest[$clave]->foto['url_foto'] }}" alt=""> 
                            @else 
                                <img class="card-img-top" src="/img/sinimagen.png" alt="">
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="form-check required">
                                <div class="row mb-1">
                                    <h4>{{ $clave + 1 }} .- {{ $preguntasTest[$clave]->pregunta }}</h4>
                                </div>
                                <ul>
                                    @foreach ($pregunta->respuesta as $respuesta)
                                    @if (session()->has('error'.$respuesta->id))
                                        <li class='{{ session('error'.$respuesta->id) }}'>
                                    @elseif(session()->has('buena'.$respuesta->id))
                                        <li class='{{ session('buena'.$respuesta->id) }}'>
                                    @else
                                        <li>
                                    @endif
                                        <input class="form-check-input" type="radio" name="pregunta{{ $respuesta->id_pregunta }}" value="{{ $respuesta->id }}" @if (session()->has('error'.$respuesta->id))
                                            checked
                                        @elseif(session()->has('buena'.$respuesta->id))
                                            checked
                                        @endif required>  
                                            <label class="form-check-label" for="pregunta{{ $respuesta->id_pregunta }}">
                                                {{ $respuesta->respuesta }}
                                            </label>   
                                        </li>   
                                    @endforeach           
                                </ul>
                            </div>
                        </div>  
                    </div>
                </section>
                @endforeach
                @if (session()->has('puntuacion-aprobado'))
                    <div class="alert alert-success wow fadeInLeft text-center">
                        {{ session('puntuacion-aprobado') }}
                    </div>
                @endif
                @if (session()->has('puntuacion-suspenso'))
                    <div class="alert alert-danger wow fadeInLeft text-center">
                        {{ session('puntuacion-suspenso') }}
                    </div>
                @endif
                <div class="form-row col mb-2 mt-3">
                    <div class="form-group col-sm-4 col-md-4 text-center">
                        <button type="submit" class="btn color wow fadeInLeft">
                            {{ __('Finalizar') }}
                        </button>
                    </div>
                    <div class="form-group col-sm-4 col-md-4 text-center">
                        <a href="" onclick="window.location.reload();"  class="btn color wow fadeInLeft">Reiniciar</a>
                    </div>
                    <div class="form-group col-sm-4 col-md-4 text-center">
                        <a href="../tests" class="btn color wow fadeInLeft">Volver</a>
                    </div>
                </div>
                {{-- <div class="form-group row col-md-offset-1 mt-5">
                    <div class="col-md-4 offset-md-4 text-center mb-1">
                        <button type="submit" class="btn color wow fadeInLeft">
                            {{ __('Finalizar') }}
                        </button>
                    </div>
                    <div class="col-md-4 offset-md-4 text-center">
                        <a href="../tests" class="btn color wow fadeInLeft">Volver</a>
                    </div>
                </div>--}}
            </form>
        </div>
    </div>
    @endif
</div>
@endsection
@push('scripttablas')
  <script src="/js/quintamarcha.js"></script>
@endpush

