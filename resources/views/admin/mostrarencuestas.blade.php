@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($encuestas)
    <div class="row-fluid">
        <div class="col-12">
            <div class="card">
                @if (session()->has('respuesta'))
                    <div class="alert alert-success text-center">
                        {{ session('respuesta') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="dataTables_wrapper dt-bootstrap4">
                        <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.crearencuesta') }}">Crear encuesta</a>
                        <div class="row">
                            <div class="col-12 table-responsive">
                              <table id="usotabla" class="table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc align-middle">ID</th>
                                            <th class="sorting align-middle">Título</th>
                                            <th class="sorting align-middle">Número de preguntas</th>
                                            <th class="sorting align-middle">Veces realizado</th>
                                            <th class="sorting align-middle">Fecha de creación</th>
                                            <th class="sorting align-middle">Preguntas</th>
                                            <th class="sorting align-middle">Editar nombre</th>
                                            <th class="sorting align-middle">Resultados</th>
                                            <th class="sorting align-middle">Elimninar</th>
                                            <th class="sorting align-middle">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($encuestas))
                                            @foreach ($encuestas as $encuesta)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $encuesta->id }}</td>
                                                    <td>{{ $encuesta->titulo }}</td>
                                                    <td>{{ $encuesta->preguntasEncuestas->count() }}</td>
                                                    <td>{{ $encuesta->votada }}</td>
                                                    <td>{{ $encuesta->created_at->formatLocalized(' %d %B %H:%M') }}</td>
                                                    <td>
                                                        {{-- <button type="button" class="btn color wow fadeInLeft" data-toggle="modal" data-target="#encuesta{{ $encuesta->id }}">Ver</button> --}}
                                                        <a href="{{ route('admin.mostrarpreguntasencuestas', $encuesta->id) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.editarencuesta.editar', $encuesta ) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a>
                                                    </td>
                                                    <td>
                                                        @if ($encuesta->votada > 0)
                                                            <button type="button" class="btn color wow fadeInLeft" data-toggle="modal" data-target="#encuesta{{ $encuesta->id }}"><i class="icofont icofont-eye"></i></button>
                                                        @else
                                                            Sin resultados
                                                        @endif
                                                        {{-- <a href="{{ route('admin.editarpreguntaencuesta.editar', $encuesta) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a> --}}
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.borrarencuesta.borrar', ['encuesta'=>$encuesta->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar la encuesta?')" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn color wow fadeInLeft"><i class="icofont icofont-close"></i></button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        @if (count($encuesta->preguntasEncuestas) > 0)
                                                            <a href="{{ route('encuesta', [$encuesta->uuid]) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a>
                                                        @else
                                                            Sin preguntas
                                                        @endif
                                                    </td>
                                                </tr>
                                                @if ($encuesta->votada > 0)
                                                    <div id="encuesta{{ $encuesta->id }}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $encuesta->titulo }}</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                @foreach ($encuesta->preguntasEncuestas as $valor => $pregunta)
                                                                                    <div class="progress-group mb-2">
                                                                                        {{$pregunta->pregunta}}
                                                                                        <div class="progress">
                                                                                            @foreach ($pregunta->respuesta as $respuesta)
                                                                                                <div class="progress-bar color_{{$respuesta->id}} progress-bar-striped progress-bar-animated" data-id="{{$respuesta->id}}" role="progressbar" style="width: {{ ($respuesta->votada / $encuesta->votada) * 100 }}%" aria-valuenow="{{ ($respuesta->votada / $encuesta->votada) * 100 }}" aria-valuemin="0" aria-valuemax="100">{{$respuesta->respuesta}}
                                                                                                    - @if($respuesta->tipo == 2 && $respuesta->votada == 2) {{ round(($respuesta->votada * 100 ) / ($pregunta->respuesta->count() + $respuesta->votada - 1), 2) }}%
                                                                                                    @elseif($respuesta->tipo == 2 && $respuesta->votada == 1) {{ round(($respuesta->votada * 100 ) / ($pregunta->respuesta->count() + $respuesta->votada), 2) }}%
                                                                                                    @else {{ ($respuesta->votada / $encuesta->votada) * 100 }}% @endif
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
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
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
@push('scripttablas')
  <script src="/js/quintamarcha.js"></script>
  <script>
    $(window).on("load", function() {
      tabla();
      coloresEstadistica();
    });
  </script>
@endpush
