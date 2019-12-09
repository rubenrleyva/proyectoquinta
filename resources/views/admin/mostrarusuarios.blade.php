@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($usuarios)
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
                      <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.crearusuario') }}">Crear usuario</a>
                        <div class="row">
                            <div class="col-12 table-responsive">
                              <table id="usotabla" class="table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead class="thead-dark">
                                        <tr role="row">
                                            <th class="sorting_asc align-middle">ID</th>
                                            <th class="sorting align-middle">Nombre</th>
                                            <th class="sorting align-middle">Dni</th>
                                            <th class="sorting align-middle">Domicilio</th>
                                            <th class="sorting align-middle">Fecha de nacimiento</th>
                                            <th class="sorting align-middle">Teléfono</th>
                                            <th class="sorting align-middle">Localidad</th>
                                            <th class="sorting align-middle">Código Postal</th>
                                            <th class="sorting align-middle">Matrícula</th>
                                            <th class="sorting align-middle">Email</th>
                                            <th class="sorting align-middle">Teórico</th>
                                            <th class="sorting align-middle">Práctico</th>
                                            <th class="sorting align-middle">Fecha de Inscripción</th>
                                            <th class="sorting align-middle">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            <tr role="row" class="@if(($usuario->teorico == 1) && ($usuario->practico == 1)) table-success @endif">
                                                <td class="sorting_1">{{ $usuario->id }}</td>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->dni }}</td>
                                                <td>{{ $usuario->domicilio }}</td>
                                                <td>{{ $usuario->fechanacimiento }}</td>
                                                <td>{{ $usuario->telefono }}</td>
                                                <td>{{ $usuario->localidad }}</td>
                                                <td>{{ $usuario->codigopostal }}</td>
                                                <td>
                                                    @if ($usuario->matricula == null)
                                                        No procede
                                                    @else
                                                        {{ $usuario->matricula }}
                                                    @endif 
                                                </td>   
                                                <td>{{ $usuario->email }}</td>
                                                <td>
                                                  @if ($usuario->teorico == 1)
                                                      Aprobado
                                                  @elseif($usuario->teorico == 2)
                                                      No Aprobado     
                                                  @else
                                                      No procede
                                                  @endif
                                                </td>
                                                <td>
                                                  @if ($usuario->practico == 1)
                                                      Aprobado
                                                  @elseif($usuario->practico == 2)
                                                      No Aprobado     
                                                  @else
                                                      No procede
                                                  @endif 
                                                </td>
                                                <td>{{ $usuario->created_at->formatLocalized(' %d %B %H:%M') }}</td>
                                                <td>
                                                    @if (Auth::user()->tipousuario == 1)
                                                      <a href="{{ route('admin.editarusuario.editar', $usuario ) }}" class="btn color wow fadeInLeft mb-10"><i class="icofont icofont-edit-alt"></i></a>
                                                      <form id="borrarregistro" action="{{ route('admin.borrarusuario.borrar', ['usuario'=>$usuario->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar al usuario?')" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn color wow fadeInLeft mb-10"><i class="icofont icofont-close"></i></button>
                                                    </form>
                                                    @endif
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
