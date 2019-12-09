@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($preguntas)
    <div class="row-fluid">
        <div class="col-12">
            <div class="card">
                @if (session()->has('respuesta'))
                <div class="alert alert-success wow fadeInLeft text-center">
                {{ session('respuesta') }}
                </div>
                @endif
                <div class="card-body">
                    <div class="dataTables_wrapper dt-bootstrap4">
                        <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.crearpreguntaencuesta', $encuesta->id ) }}">Crear pregunta</a>
                        <div class="row">
                            <div class="col-12 table-responsive">
                              <table id="usotabla" class="table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead class="thead-dark">
                                        <tr role="row">
                                            <th class="sorting align-middle">ID</th>
                                            <th>Nombre Encuesta</th>
                                            <th>Número</th>
                                            <th>Pregunta</th>
                                            <th>Fecha de creación</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($preguntas as $pregunta)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $pregunta->id }}</td>
                                                <td>{{ $pregunta->encuesta->titulo }}</td>
                                                <td>{{ $pregunta->numero }}</td>
                                                <td>{{ $pregunta->pregunta }}</td>
                                                <td>{{ $pregunta->created_at->formatLocalized(' %d %B %H:%M') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.editarpreguntaencuesta.editar', $pregunta->id ) }}" class="btn color wow fadeInLeft mb-10"><i class="icofont icofont-edit-alt"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.borrarpreguntaencuesta.borrar', ['pregunta'=>$pregunta->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar la pregunta?')" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn color wow fadeInLeft mb-10"><i class="icofont icofont-close"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
