@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($fotos)
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
                        <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.crearfoto') }}">Añadir foto</a>
                        <div class="row">
                            <div class="col-12 table-responsive">
                              <table id="usotabla" class="table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc align-middle">ID</th>
                                            <th class="sorting align-middle">Imagen</th>
                                            <th class="sorting align-middle">Tipo</th>
                                            <th class="sorting align-middle">Fecha de realización</th>
                                            <th class="sorting align-middle">Editar</th>
                                            <th class="sorting align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($fotos))
                                            @foreach ($fotos as $foto)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $foto->id }}</td>
                                                    <td> <img class="fotos" src="{{ $foto->url_foto }}" alt="{{ $foto->tipo_foto }}"> </td>
                                                    <td> {{ $foto->tipo_foto }} </td>
                                                    <td>{{ $foto->created_at->formatLocalized(' %d %B %H:%M') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.editarfoto.editar', $foto ) }}" class="btn color wow fadeInLeft mb-10"><i class="icofont icofont-edit-alt"></i></a>
                                                    </td>
                                                    <td>
                                                        <form id="borrarregistro" action="{{ route('admin.borrarfoto.borrar', ['id'=>$foto->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar la foto?')" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn color wow fadeInLeft mb-10"><i class="icofont icofont-close"></i></button>
                                                        </form>
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
