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
                        <div class="row">
                          <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.crearpregunta') }}">Crear pregunta</a>
                            <div class="col-sm-12">
                              <table id="usotabla" class="table w-100 d-block d-md-table table-bordered table-hover dataTable text-center">
                                    <thead>
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
                                                    <a href="{{ route('admin.editarpreguntaencuesta.editar', $pregunta->id ) }}" class="btn color wow fadeInLeft mb-10"><i class="fa fa-pencil"></i></a>
                                                    <form action="{{ route('admin.borrarpreguntaencuesta.borrar', ['pregunta'=>$pregunta->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar la pregunta?')" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn color wow fadeInLeft mb-10"><i class="fa fa-times"></i></button>
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
