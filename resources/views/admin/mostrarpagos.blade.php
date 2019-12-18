@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($pagos)
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
                        <a class="btn color wow fadeInLeft mb-10" href="{{ route('admin.crearpago') }}">Crear pago</a>
                        <div class="row">
                            <div class="col-12 table-responsive">
                              <table id="usotabla" class="table w-100 table-striped table-bordered dt-responsive nowrap text-center" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc align-middle">ID</th>
                                            <th class="sorting align-middle">Número de pago</th>
                                            <th class="sorting align-middle">Alumno</th>
                                            <th class="sorting align-middle">Concepto</th>
                                            <th class="sorting align-middle">Número de clases</th>
                                            <th class="sorting align-middle">Cantidad</th>
                                            <th class="sorting align-middle">Pagado</th>
                                            <th class="sorting align-middle">Fecha de realización</th>
                                            <th class="sorting align-middle">Editar</th>
                                            <th class="sorting align-middle">Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($pagos))
                                            @foreach ($pagos as $pago)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $pago->id }}</td>
                                                    <td>{{ $pago->numeropago}}</td>
                                                    <td>{{ $pago->usuario->name }} </td>
                                                    <td>{{ $pago->concepto }} </td>
                                                    <td>{{ $pago->clases }} </td>
                                                    <td>{{ $pago->precioiva }}€</td>
                                                    @if ($pago->pagado)
                                                        <td>Pagado</td>
                                                    @else
                                                        <td>No pagado</td>
                                                    @endif  
                                                    <td>{{ $pago->created_at->formatLocalized(' %d %B %H:%M') }}</td>
                                                    <td> - </td>
                                                    <td> - </td>
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
