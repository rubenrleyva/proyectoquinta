@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($servicios)
    <div class="row-fluid">
        <div class="col-12">
            <div class="card">
                @if (session()->has('respuesta'))
                    <div class="alert alert-success wow fadeInLeft text-center">
                    {{ session('respuesta') }}
                    </div>
                @endif
                @if (session()->has('respuesta-negativa'))
                    <div class="alert alert-danger wow fadeInLeft text-center">
                    {{ session('respuesta-negativa') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="dataTables_wrapper dt-bootstrap4">
                      <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.crearservicio') }}">Crear servicio</a>
                        <div class="row">
                            <div class="col-12 table-responsive">
                              <table id="usotabla" class="table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead class="thead-dark">
                                        <tr role="row">
                                            <th class="sorting_asc align-middle">ID</th>
                                            <th class="sorting align-middle">Tipo formación</th>
                                            <th class="sorting align-middle">Nombre</th>
                                            <th class="sorting align-middle">Descripción</th>
                                            <th class="sorting align-middle">Texto1</th>
                                            <th class="sorting align-middle">Texto2</th>
                                            <th class="sorting align-middle">Texto3</th>
                                            <th class="sorting align-middle">Texto4</th>
                                            <th class="sorting align-middle">Texto5</th>
                                            <th class="sorting align-middle">Texto6</th>
                                            <th class="sorting align-middle">Texto7</th>
                                            <th class="sorting align-middle">Texto8</th>
                                            <th class="sorting align-middle">Clases</th>
                                            <th class="sorting align-middle">Precio sin IVA</th>
                                            <th class="sorting align-middle">Precio con IVA</th>
                                            <th class="sorting align-middle">¿En oferta?</th>
                                            <th class="sorting align-middle">Fecha de creación</th>
                                            <th class="sorting align-middle">Editar</th>
                                            <th class="sorting align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($servicios as $servicio)
                                            <tr role="row">
                                                <td class="sorting_1">{{ $servicio->id }}</td>
                                                <td>{{ $servicio->tipo_servicio }}</td>
                                                <td>{{ $servicio->nombre_servicio }}</td>
                                                <td>{{ $servicio->descripcion }}</td>
                                                <td>{{ $servicio->texto1 }}</td>
                                                <td>{{ $servicio->texto2 }}</td>
                                                <td>{{ $servicio->texto3 }}</td>
                                                <td>{{ $servicio->texto4 }}</td>
                                                <td>{{ $servicio->texto5 }}</td>
                                                <td>{{ $servicio->texto6 }}</td>
                                                <td>{{ $servicio->texto7 }}</td>
                                                <td>{{ $servicio->texto8 }}</td>
                                                <td>{{ $servicio->clases }}</td>
                                                <td>{{ $servicio->precio }}</td>
                                                <td>{{ $servicio->precioiva }}</td>
                                                <td>
                                                    @if ($servicio->oferta == 1)
                                                        Si
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>{{ $servicio->created_at->formatLocalized(' %d %B %H:%M') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.editarservicio.editar', $servicio ) }}" class="btn color wow fadeInLeft mb-10"><i class="icofont icofont-edit-alt"></i></a>
                                                </td>
                                                <td>
                                                    <form name="borrarregistro" action="{{ route('admin.borrarservicio.borrar', ['servicio'=>$servicio->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar la formación?')" >
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
