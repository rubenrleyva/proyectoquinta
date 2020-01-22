@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($tests)
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
                        <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.creartest') }}">Crear test</a>
                        <div class="row">
                            <div class="col-12 table-responsive">
                              <table id="usotabla" class="table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc align-middle">ID</th>
                                            <th class="sorting align-middle">Tipo</th>
                                            <th class="sorting align-middle">Título</th>
                                            <th class="sorting align-middle">Número de preguntas</th>
                                            <th class="sorting align-middle">Veces realizado</th>
                                            <th class="sorting align-middle">Fecha de creación</th>
                                            <th class="sorting align-middle">Preguntas</th>
                                            <th class="sorting align-middle">Editar tipo</th>
                                            <th class="sorting align-middle">Resultados</th>
                                            <th class="sorting align-middle">Elimninar</th>
                                            <th class="sorting align-middle">Realizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($tests))
                                            @foreach ($tests as $test)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $test->id }}</td>
                                                    <td>{{ $test->tipo }}</td>
                                                    <td>{{ $test->titulo }}</td>
                                                    <td>{{ $test->preguntasTests->count() }}</td>
                                                    <td>{{ $test->realizado }}</td>
                                                    <td>{{ $test->created_at->formatLocalized(' %d %B %H:%M') }}</td>
                                                    <td>
                                                        {{-- <button type="button" class="btn color wow fadeInLeft" data-toggle="modal" data-target="#encuesta{{ $encuesta->id }}">Ver</button> --}}
                                                        <a href="{{ route('admin.mostrarpreguntastests', $test->id) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.editartest.editar', $test ) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a>
                                                    </td>
                                                    <td>
                                                        @if ($test->realizado > 0)
                                                            <button type="button" class="btn color wow fadeInLeft" data-toggle="modal" data-target="#test{{ $test->id }}"><i class="icofont icofont-eye"></i></button>
                                                        @else
                                                            Sin resultados
                                                        @endif
                                                        {{-- <a href="{{ route('admin.editarpreguntaencuesta.editar', $encuesta) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a> --}}
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.borrartest.borrar', ['test'=>$test->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar el test?')" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn color wow fadeInLeft"><i class="icofont icofont-close"></i></button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        @if ($test->preguntasTests != null)
                                                            <a href="{{ route('test', [$test->uuid]) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a>
                                                        @else
                                                            Sin preguntas
                                                        @endif
                                                    </td>
                                                </tr>
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
    });
  </script>
@endpush
