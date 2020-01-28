@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($clases)
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
                        {{-- <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.crearclase') }}">Crear clase</a> --}}
                        <div class="row">
                            <div class="col-12 table-responsive">
                              <table id="usotabla" class="table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc align-middle">ID</th>
                                            <th class="sorting align-middle">Número de clase</th>
                                            <th class="sorting align-middle">Alumno</th>
                                            <th class="sorting align-middle">Profesor</th>
                                            <th class="sorting align-middle">Comentarios</th>
                                            {{-- <th class="sorting align-middle">Precio</th>
                                            <th class="sorting align-middle">Precio IVA</th> --}}
                                            <th class="sorting align-middle">Fecha de realización</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($clases))
                                            @foreach ($clases as $clase)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $clase->id }}</td>
                                                    <td>{{ $clase->clase_numero }}</td>
                                                    <td>{{ $clase->usuarioAlumno->name }} {{ $clase->usuarioAlumno->apellidos }}</td>
                                                    <td>{{ $clase->profesor }}</td>
                                                    <td>{{ $clase->comentarios }}</td>
                                                    {{-- <td class ="precio">{{ $clase->precio }} €</td>
                                                    <td class ="precioiva">{{ $clase->precioiva }} €</td> --}}
                                                    <td>{{ $clase->created_at->formatLocalized(' %d %B %H:%M') }}</td>
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
        precios();
        $('#usotabla tbody td').on(function() {
            alert("hola");
            precios();
        })
      
    });
  </script>
@endpush
