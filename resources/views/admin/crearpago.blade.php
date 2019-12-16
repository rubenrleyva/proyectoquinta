@extends('admin.bienvenido')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (isset($pago))
                        <form name="editarpago" method="POST" action="{{ route('admin.guardarpagoeditado.guardar', ['pago'=>$pago]) }}">
                    @else
                        <form name="crearpago" method="POST" action="{{ route('admin.guardarpago.guardar') }}">
                    @endif
                        @csrf

                        <div class="form-group row">
                            <label for="alumno" class="col-md-4 col-form-label text-md-right text-center">{{ __('Alumno') }}</label>
                            <div class="col-md-6">
                                <select id="alumno" name="alumno" class="form-control @error('alumno') is-invalid @enderror" selected required>
                                @foreach ($alumnos as $alumno)
                                    <option value='{{ $alumno->id }}'>{{ $alumno->name }}</option>         
                                @endforeach 
                                </select>
                                @error('alumno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="concepto" class="col-md-4 col-form-label text-md-right text-center">{{ __('Concepto') }}</label>
                            <div class="col-md-6">
                                <select id="concepto" name="concepto" class="form-control @error('concepto') is-invalid @enderror" selected>
                                    <option value='0'>Clases prácticas</option>      
                                @foreach ($permisos as $permiso)
                                    <option value='{{ $permiso->descripcion }}' data-precio='{{ $permiso->precio }}' data-clase='{{ $permiso->clases }}'>{{ $permiso->descripcion }} con {{ $permiso->clases }} clases por {{ $permiso->precio }} €</option>         
                                @endforeach 
                                </select>
                                @error('concepto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precioclases" class="col-md-4 col-form-label text-md-right text-center">{{ __('Precio de clases') }}</label>

                            <div class="col-md-6">
                                <input id="precioclases" type="number" class="form-control @error('precioclases') is-invalid @enderror" name="precioclases" autocomplete="precioclases" autofocus>

                                @error('precioclases')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numeroclases" class="col-md-4 col-form-label text-md-right text-center">{{ __('Número de clases') }}</label>

                            <div class="col-md-6">
                                <select id="numeroclases" name="numeroclases" class="form-control @error('numeroclases') is-invalid @enderror" name="numeroclases">
                                    <option value='0' selected>0</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                    <option value='10'>10</option>
                                    <option value='15'>15</option>
                                    <option value='20'>20</option>
                                    <option value='25'>25</option>
                                </select>

                                @error('numeroclases')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>         

                        <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right text-center">{{ __('Precio sin IVA') }}</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" step="any" class="form-control @error('precio') is-invalid @enderror" name="precio" required autocomplete="precio">

                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precioiva" class="col-md-4 col-form-label text-md-right text-center">{{ __('Precio con IVA') }}</label>

                            <div class="col-md-6">
                                <input id="precioiva" type="number" step="any" class="form-control @error('precioiva') is-invalid @enderror" name="precioiva" required autocomplete="precioiva">

                                @error('precioiva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pagado" class="col-md-4 col-form-label text-md-right text-center">{{ __('¿Pagado?') }}</label>
                            <div class="col-md-1">
                                <input type="checkbox" class="form-control text-left" id="pagado" name="pagado">
                            </div>
                        </div>

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarpermiso/*'))
                                        {{ __('Editar Pago') }}
                                    @else
                                        {{ __('Añadir Pago') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../pagos" class="btn color wow fadeInLeft">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripttablas')
    <script src="/js/quintamarcha.js"></script>
    <script>
        $(window).on("load", function() {
            usuarios();
            precioIvaPagos();
        });
    </script>
@endpush
