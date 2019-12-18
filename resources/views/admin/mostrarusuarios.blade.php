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
                              <table id="usotabla" class="profesores table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead class="thead-dark">
                                        <tr role="row">
                                            <th class="sorting_asc align-middle">ID</th>
                                            <th class="sorting align-middle">Apellidos</th>
                                            <th class="sorting align-middle">Dni</th>
                                            <th class="sorting align-middle">Teléfono</th>
                                            <th class="sorting align-middle">Matrícula</th>
                                            <th class="sorting align-middle">Email</th>
                                            <th class="sorting align-middle">Ver</th>
                                            <th class="sorting align-middle">Editar</th>
                                            <th class="sorting align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            @if ($usuario->tipousuario != 1)
                                                <tr role="row" class="@if(($usuario->teorico == 1) && ($usuario->practico == 1)) table-success @endif">
                                                    <td class="sorting_1">{{ $usuario->id }}</td>
                                                    <td>{{ $usuario->apellidos }}</td>
                                                    <td>{{ $usuario->dni }}</td>
                                                    <td>{{ $usuario->telefono }}</td>
                                                    <td>
                                                        @if ($usuario->matricula == null)
                                                            No procede
                                                        @else
                                                            {{ $usuario->matricula }}
                                                        @endif 
                                                    </td>   
                                                    <td>{{ $usuario->email }}</td>
                                                    <td><button type="button" class="btn color wow fadeInLeft" data-toggle="modal" data-target="#usuario{{ $usuario->dni }}"><i class="icofont icofont-eye"></i></button></td>
                                                    <td><a href="{{ route('admin.editarusuario.editar', $usuario ) }}" class="btn color wow fadeInLeft"><i class="icofont icofont-edit-alt"></i></a></td>
                                                    <td>                           
                                                        <form id="borrarregistro" action="{{ route('admin.borrarusuario.borrar', ['usuario'=>$usuario->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar al usuario?')" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn color wow fadeInLeft"><i class="icofont icofont-close"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <div id="usuario{{ $usuario->dni }}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <div class="container-fluid">                                                 
                                                                            <div class="row mb-3">
                                                                                <img src="{{ $usuario->foto->url_foto }}" class="rounded mx-auto d-block">
                                                                            </div>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <label for="name" class="col-md-3 col-form-label text-md-right text-center font-weight-bold">{{ __('Nombre:') }}</label>
                                                                                        <label for="name" class="col-md-3 col-form-label text-md-left text-center">{{ $usuario->name }}</label>
                                                                                        <label for="apellidos" class="col-md-3 col-form-label text-md-right text-center font-weight-bold">{{ __('Apellidos:') }}</label>
                                                                                        <label for="apellidos" class="col-md-3 col-form-label text-md-left text-center">{{ $usuario->apellidos }}</label>
                                                                                    </div>              
                                                                                    <div class="row">
                                                                                        <label for="dni" class="col-md-3 col-form-label text-md-right text-center font-weight-bold">{{ __('DNI:') }}</label>
                                                                                        <label for="dni" class="col-md-3 col-form-label text-md-left text-center">{{ $usuario->dni }}</label>
                                                                                        <label for="domicilio" class="col-md-3 col-form-label text-md-right text-center font-weight-bold">{{ __('Domicilio:') }}</label>
                                                                                        <label for="domicilio" class="col-md-3 col-form-label text-md-left text-center">{{ $usuario->domicilio }}</label>
                                                                                    </div>      
                                                                                    <div class="row">
                                                                                        <label for="fechanacimiento" class="col-md-3 col-form-label text-md-right text-center font-weight-bold">{{ __('Fecha de nacimiento:') }}</label>
                                                                                        <label for="fechanacimiento" class="col-md-3 col-form-label text-md-left text-center">{{ $usuario->fechanacimiento }}</label>
                                                                                        <label for="telefono" class="col-md-3 col-form-label text-md-right text-center font-weight-bold">{{ __('Teléfono:') }}</label>
                                                                                        <label for="telefono" class="col-md-3 col-form-label text-md-left text-center">{{ $usuario->telefono }}</label>
                                                                                    </div>               
                                                                                    <div class="row">
                                                                                        <label for="matricula" class="col-md-3 col-form-label text-md-right text-center font-weight-bold">{{ __('Matrícula:') }}</label>
                                                                                        <label for="matricula" class="col-md-3 col-form-label text-md-left text-center">{{ $usuario->matricula }}</label>
                                                                                        <label for="clasespracticas" class="col-md-3 col-form-label text-md-right text-center font-weight-bold">{{ __('Clases prácticas:') }}</label>
                                                                                        <label for="clasespracticas" class="col-md-3 col-form-label text-md-left text-center">{{ $usuario->clasespracticas }}</label>
                                                                                    </div>        
                                                                                </div>                                                                   
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row col-md-offset-1">
                                                                        <div class="col-md-4 offset-md-4 text-center mb-1">
                                                                            <a class="btn color col-form-label text-md-right text-center font-weight-bold" href="{{ route('admin.editarpago.editar', $usuario) }}">Añade pago</a>  
                                                                        </div>
                                                                        <div class="col-md-4 offset-md-4 text-center">
                                                                            <a class="btn color col-form-label text-md-right text-center font-weight-bold" href="{{ route('admin.crearclase', $usuario) }}">Añade clase</a>
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
