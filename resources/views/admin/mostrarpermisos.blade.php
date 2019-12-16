@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($permisos)
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
                      <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.crearpermiso') }}">Crear permiso</a>
                        <div class="row">
                            <div class="col-12 table-responsive">
                              <table id="usotabla" class="table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead class="thead-dark">
                                        <tr role="row">
                                            <th class="sorting_asc align-middle">ID</th>
                                            <th class="sorting align-middle">Permiso</th>
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
                                        @foreach ($permisos as $permiso)
                                            <tr role="row">
                                                <td class="sorting_1">{{ $permiso->id }}</td>
                                                <td>{{ $permiso->tipopermiso }}</td>
                                                <td>{{ $permiso->descripcion }}</td>
                                                <td>{{ $permiso->texto1 }}</td>
                                                <td>{{ $permiso->texto2 }}</td>
                                                <td>{{ $permiso->texto3 }}</td>
                                                <td>{{ $permiso->texto4 }}</td>
                                                <td>{{ $permiso->texto5 }}</td>
                                                <td>{{ $permiso->texto6 }}</td>
                                                <td>{{ $permiso->texto7 }}</td>
                                                <td>{{ $permiso->texto8 }}</td>
                                                <td>{{ $permiso->clases }}</td>
                                                <td>{{ $permiso->precio }}</td>
                                                <td>{{ $permiso->precioiva }}</td>
                                                <td>
                                                    @if ($permiso->oferta == 1)
                                                        Si
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>{{ $permiso->created_at->formatLocalized(' %d %B %H:%M') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.editarpermiso.editar', $permiso ) }}" class="btn color wow fadeInLeft mb-10"><i class="icofont icofont-edit-alt"></i></a>
                                                </td>
                                                <td>
                                                    <form id="borrarregistro" action="{{ route('admin.borrarpermiso.borrar', ['permiso'=>$permiso->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar al usuario?')" >
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
