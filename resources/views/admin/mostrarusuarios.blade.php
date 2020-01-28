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
                                                        @if ($usuario->pago->count() > 0)
                                                            No procede
                                                        @else
                                                            <form name="borrarregistro" action="{{ route('admin.borrarusuario.borrar', ['usuario'=>$usuario->id]) }}" method="POST" style="display: inline" onclick="return confirm('¿Quieres borrar al usuario?')" >
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn color wow fadeInLeft"><i class="icofont icofont-close"></i></button>
                                                            </form>   
                                                        @endif
                                                    </td>
                                                </tr>
                                                <div id="usuario{{ $usuario->dni }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <div class="container-fluid">
                                                                        {{-- <div class="row mb-3">
                                                                            <img src="{{ $usuario->foto->url_foto }}" class="rounded mx-auto d-block">
                                                                        </div> --}}
                                                                        <div class="card ">
                                                                            <div class="card-body">
                                                                                <div class="form-row mb-4">
                                                                                    <img src="{{ $usuario->foto->url_foto }}" class="rounded mx-auto d-block">
                                                                                </div>
                                                                                <div class="form-row mb-2">
                                                                                    <div class="form-group col-md-12 text-center">
                                                                                        <h4 class="font-weight-bold">Datos personales:</h4>  
                                                                                    </div>
                                                                                </div>                                                                             
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="nombre">Nombre</label>
                                                                                        <div for="nombre" class="form-control w-auto h-auto">{{ $usuario->name }}</div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="email">Email</label>
                                                                                        <p for="email" class="form-control w-auto h-auto">{{ $usuario->email }}</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="inputAddress">Dirección</label>
                                                                                    <p for="email" class="form-control w-auto h-auto">{{ $usuario->domicilio }}</p>
                                                                                </div>  
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="inputCity">Localidad</label>
                                                                                        <p for="email" class="form-control w-auto h-auto">{{ $usuario->localidad }}</p>
                                                                                    </div>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label for="cp">Teléfono</label>
                                                                                        <p for="cp" class="form-control w-auto h-auto">{{ $usuario->telefono }}</p>
                                                                                    </div>
                                                                                    <div class="form-group col-md-2">
                                                                                        <label for="cp">CP</label>
                                                                                        <p for="cp" class="form-control w-auto h-auto">{{ $usuario->codigopostal }}</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row mb-3">
                                                                                    <div class="form-group col-md-6 ">
                                                                                        <label for="clases">Nº Prácticas restantes</label>
                                                                                        <p for="email" class="form-control w-auto h-auto">{{ $usuario->clasespracticas }}</p>
                                                                                    </div>
                                                                                    <div class="form-group col-md-6 ">
                                                                                        <label for="cp">Nº Prácticas realizadas</label>
                                                                                        <p for="cp" class="form-control w-auto h-auto">
                                                                                            {{ $usuario->clase->count() }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                @if ($usuario->clase->count() > 0)
                                                                                    <div class="form-row mb-2">
                                                                                        <div class="form-group col-md-12 text-center">
                                                                                            <h5 class="font-weight-bold">Clases prácticas:</h5>  
                                                                                        </div>
                                                                                    </div>   
                                                                                    @foreach ($usuario->clase as $clase)
                                                                                        <div class="form-row mb-1">
                                                                                            <div class="form-group col-md-1">
                                                                                                <label>Nº</label>
                                                                                                <p class="form-control">
                                                                                                    {{ $clase->clase_numero }} 
                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="form-group col-md-11">
                                                                                                <label>Comentario</label>
                                                                                                <p class="form-control w-auto h-auto">
                                                                                                    {{ $clase->comentarios }}    
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach    
                                                                                @endif
                                                                                
                                                                                @if ($usuario->pago->count() > 0)
                                                                                    
                                                                                    <div class="form-row mb-2 mt-3">
                                                                                        <div class="form-group col-md-12 text-center">
                                                                                            <h5 class="font-weight-bold">Pagos realizados:</h5>  
                                                                                        </div>
                                                                                    </div>

                                                                                    @foreach ($usuario->pago as $pago)
                                                                                        <div class="form-row mb-1">
                                                                                            <div class="form-group col-md-1">
                                                                                                <label>Nº</label>
                                                                                                <p class="form-control">
                                                                                                    {{ $pago->numeropago }} 
                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="form-group col-md-7">
                                                                                                <label>Concepto</label>
                                                                                                <p class="form-control w-auto h-auto">
                                                                                                    {{ $pago->concepto.' con '.$pago->clases.' clases.' }}    
                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="form-group col-md-4">
                                                                                                <label>Fecha</label>
                                                                                                <p class="form-control w-auto h-auto">
                                                                                                    {{ $pago->created_at->formatLocalized(' %d %b %H:%M') }}    
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mb-3">
                                                                     <div class="form-group col-md-6 text-center">
                                                                        {{-- <a class="btn color font-weight-bold" href="{{ route('admin.editarpago.editar', $usuario) }}">Añade pago</a> --}}
                                                                        <a class="btn color font-weight-bold" href="{{ route('admin.crearpago', $usuario->id) }}">Añade pago</a>
                                                                    </div>
                                                                    <div class="form-group col-md-6 text-center">
                                                                        @if ($usuario->clasespracticas > 0)
                                                                            <a class="btn color font-weight-bold" href="{{ route('admin.crearclase', $usuario) }}">Añade clase</a>
                                                                        @endif
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
