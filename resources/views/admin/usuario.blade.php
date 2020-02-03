@extends('admin.bienvenido')

@section('contenido')
<div class="container pt-5">
    @if ($usuario)
    <div class="row">
        <div class="col-12">
            <div class="row d-flex justify-content-center blog-wrapper">
                @if (isset($tests))
                    @foreach ($tests as $test)
                        <div class="blog-item col-lg-4 col-md-6 col-12 permisos">
                            <div class="card test" style="width: 18rem;">
                                <div class="card-header text-center">
                                    <h5 class="card-title">Test {{ Str::lower($test->tipo) }} {{ $test->permiso }}</h5>
                                </div>
                                <a href="{{ route('test', [$test->uuid]) }}" class="image color wow">
                                    <img class="card-img-top" src="{{ $test->preguntasTests[0]->foto->url_foto }}" alt="Card image cap">
                                    <i class="icofont icofont-edit-alt"></i>
                                </a>
                                <div class="card-body text-center">
                                    <p class="card-text">{{ $test->descripcion }}</p>
                                </div>
                                <div class="card-footer text-muted text-center">
                                    {{--<a href="{{ route('test', [$test->uuid]) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a>--}}
                                    @if ($final['test'.$test->id.'.'.'respondido'] > 0 && ($final['test'.$test->id.'.'.'respondido'] != null))
                                        <button type="button" class="btn color wow fadeInLeft" data-toggle="modal" data-target="#test{{ $test->id }}"><i class="icofont icofont-eye"></i></button>
                                    @else
                                        <button type="button" class="btn color wow fadeInLeft" data-toggle="modal" data-target="#modal-realiza"><i class="icofont icofont-eye-blocked"></i></button>
                                    @endif
                                </div>
                            </div>
                            @if ($final['test'.$test->id.'.'.'respondido'] > 0 && ($final['test'.$test->id.'.'.'respondido'] != null))
                            <div id="test{{ $test->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="container-fluid">
                                                    <div class="card ">
                                                        <div class="card-body">
                                                            <div class="form-row mb-2">
                                                                <div class="form-group col-md-12 text-center">
                                                                    <h4 class="font-weight-bold">Resultados del Test {{ $test->tipo }} {{ $test->numero }}:</h4>  
                                                                </div>
                                                            </div>                                                                             
                                                            <div class="form-row">  
                                                                <div class="form-row col-12">
                                                                    <div class="form-group col-md-12">
                                                                        <label>Nº Intentos: </label>
                                                                        <p class="form-control">
                                                                            {{ $final['test'.$test->id.'.'.'respondido'] }}
                                                                        </p>
                                                                    </div>
                                                                    @for ($i = 1; $i <= $final['test'.$test->id.'.'.'respondido']; $i++)
                                                                        <div class="form-group col-md-3">
                                                                            <label>Fecha:</label>
                                                                            <p class="form-control w-auto h-auto">
                                                                                {{ $final['test'.$test->id.'.'.'fecha'.$i]->formatLocalized('%d %B %H:%M') }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label>Nº Correctas:</label>
                                                                            <p class="form-control w-auto h-auto">
                                                                                {{ $final['test'.$test->id.'.'.'respuestas'.$i.'.'.'bien'] }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label>Nº Incorrectas:</label>
                                                                            <p class="form-control w-auto h-auto">
                                                                                {{ $final['test'.$test->id.'.'.'respuestas'.$i.'.'.'mal'] }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="form-group col-md-3 d-flex">
                                                                            @if ($final['test'.$test->id.'.'.'respuestas'.$i.'.'.'estado'] == 1)
                                                                                <a href="{{ route('test.resultado', [$test->uuid, $i]) }}" class="btn color mt-auto w-100">Aprobado</a>
                                                                            @else
                                                                                <a href="{{ route('test.resultado', [$test->uuid, $i]) }}" class="btn color mt-auto w-100">Suspenso</a>
                                                                            @endif
                                                                        </div>
                                                                    @endfor
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn color" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @endif
                        </div>
                    @endforeach
                    <div id="modal-realiza" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabell" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="text-center">
                                        <h4 class="font-weight-bold">¡Atención!</h4>  
                                    </div>
                                </div>
                                <div class="modal-body text-center">
                                    <p>Por favor, realiza un test para poder acceder a los resultados.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn color" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif		
			</div>
        </div>
    </div>
    @endif
</div>
@endsection
