@extends('admin.bienvenido')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (isset($permiso))
                        <form name="editarpermiso" method="POST" action="{{ route('admin.guardarpermisoeditado.guardar', ['permiso'=>$permiso]) }}">
                    @else
                        <form name="crearpermiso" method="POST" action="{{ route('admin.guardarpermiso.guardar') }}">
                    @endif
                        @csrf
                         <div class="form-group row">
                            <label for="tipopermiso" class="col-md-4 col-form-label text-md-right text-center">{{ __('Tipo Permiso') }}</label>
                            <div class="col-md-6">
                                <select id="tipopermiso" name="tipopermiso" class="form-control @error('tipopermiso') is-invalid @enderror" required>
                                    <option value='B' @if ((isset($permiso) && $permiso->tipopermiso == 'B')){{ old('tipopermiso', 'selected') }}@endif>Permiso B</option>     
                                    <option value='A.M' @if ((isset($permiso) && $permiso->tipopermiso == 'A.M')){{ old('tipopermiso', 'selected') }}@endif>Permiso A.M</option>
                                    <option value='A1/A2' @if ((isset($permiso) && $permiso->tipopermiso == 'A1/A2')){{ old('tipopermiso', 'selected') }}@endif>Permiso A1/A2</option>
                                    <option value='B.T.P' @if ((isset($permiso) && $permiso->tipopermiso == 'B.T.P')){{ old('tipopermiso', 'selected') }}@endif>Permiso B.T.P</option>
                                    <option value='C1/C/D1/D' @if ((isset($permiso) && $permiso->tipopermiso == 'C1/C/D1/D')){{ old('tipopermiso', 'selected') }}@endif>Permiso C1/C/D1/D</option>
                                    <option value='E' @if ((isset($permiso) && $permiso->tipopermiso == 'E')){{ old('tipopermiso', 'selected') }}@endif>Permiso E</option>
                                </select>
                                @error('tipopermiso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right text-center">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="@if (isset($permiso)){{ old('descripcion', $permiso->descripcion) }}@else{{ old('descripcion') }} @endif" required autocomplete="descripcion" autofocus>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto1" class="col-md-4 col-form-label text-md-right text-center">{{ __('Texto 1') }}</label>

                            <div class="col-md-6">
                                <input id="texto1" type="text" class="form-control @error('texto1') is-invalid @enderror" name="texto1" value="@if (isset($permiso)){{ old('texto1', $permiso->texto1) }}@else{{ old('texto1') }}@endif" autocomplete="texto1" autofocus>

                                @error('texto1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto2" class="col-md-4 col-form-label text-md-right text-center">{{ __('Texto 2') }}</label>

                            <div class="col-md-6">
                                <input id="texto2" type="text" class="form-control @error('texto2') is-invalid @enderror" name="texto2" value="@if (isset($permiso)){{ old('texto2', $permiso->texto2) }}@else{{ old('texto2') }}@endif" autocomplete="texto2" autofocus>

                                @error('texto2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto3" class="col-md-4 col-form-label text-md-right text-center">{{ __('Texto 3') }}</label>

                            <div class="col-md-6">
                                <input id="texto3" type="text" class="form-control @error('texto3') is-invalid @enderror" name="texto3" value="@if (isset($permiso)){{ old('texto3', $permiso->texto3) }}@else{{ old('texto3') }}@endif" autocomplete="texto3" autofocus>

                                @error('texto3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto4" class="col-md-4 col-form-label text-md-right text-center">{{ __('Texto 4') }}</label>

                            <div class="col-md-6">
                                <input id="texto4" type="text" class="form-control @error('texto1') is-invalid @enderror" name="texto4" value="@if (isset($permiso)){{ old('texto4', $permiso->texto4) }}@else{{ old('texto4') }}@endif" autocomplete="texto4" autofocus>

                                @error('texto4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto5" class="col-md-4 col-form-label text-md-right text-center">{{ __('Texto 5') }}</label>

                            <div class="col-md-6">
                                <input id="texto5" type="text" class="form-control @error('texto5') is-invalid @enderror" name="texto5" value="@if (isset($permiso)){{ old('texto5', $permiso->texto5) }}@else{{ old('texto5') }}@endif" autocomplete="texto5" autofocus>

                                @error('texto5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto6" class="col-md-4 col-form-label text-md-right text-center">{{ __('Texto 6') }}</label>

                            <div class="col-md-6">
                                <input id="texto6" type="text" class="form-control @error('texto6') is-invalid @enderror" name="texto6" value="@if (isset($permiso)){{ old('texto6', $permiso->texto6) }}@else{{ old('texto6') }}@endif" autocomplete="texto6" autofocus>

                                @error('texto6')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto7" class="col-md-4 col-form-label text-md-right text-center">{{ __('Texto 7') }}</label>

                            <div class="col-md-6">
                                <input id="texto7" type="text" class="form-control @error('texto7') is-invalid @enderror" name="texto7" value="@if (isset($permiso)){{ old('texto7', $permiso->texto7) }}@else{{ old('texto7') }}@endif" autocomplete="texto7" autofocus>

                                @error('texto7')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto8" class="col-md-4 col-form-label text-md-right text-center">{{ __('Texto 8') }}</label>

                            <div class="col-md-6">
                                <input id="texto8" type="text" class="form-control @error('texto8') is-invalid @enderror" name="texto8" value="@if (isset($permiso)){{ old('texto8', $permiso->texto8) }}@else{{ old('texto8') }}@endif" autocomplete="texto8" autofocus>

                                @error('texto8')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right text-center">{{ __('Precio sin IVA') }}</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" step="any" class="form-control @error('precio') is-invalid @enderror" name="precio" value="@if (isset($permiso)){{ old('precio', $permiso->precio) }}@else{{ old('precio') }}@endif" required autocomplete="precio">

                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precioferta" class="col-md-4 col-form-label text-md-right text-center">{{ __('Precio Oferta') }}</label>

                            <div class="col-md-6">
                                <input id="precioferta" type="number" step="any" class="form-control @error('precioferta') is-invalid @enderror" name="precioferta" value="@if (isset($permiso)){{ old('precioferta', $permiso->precioferta) }}@else{{ old('precioferta') }}@endif" autocomplete="precioferta">

                                @error('precioferta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precioiva" class="col-md-4 col-form-label text-md-right text-center">{{ __('Precio con IVA') }}</label>

                            <div class="col-md-6">
                                <input id="precioiva" type="number" step="any" class="form-control @error('precioiva') is-invalid @enderror" name="precioiva" value="@if (isset($permiso)){{ old('precioiva', $permiso->precioiva) }}@else{{ old('precioiva') }}@endif" required autocomplete="precioiva">

                                @error('precioiva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clases" class="col-md-4 col-form-label text-md-right text-center">{{ __('Número de clases') }}</label>

                            <div class="col-md-6">
                                <select id="clases" name="clases" class="form-control @error('clases') is-invalid @enderror" @if ((isset($permiso) && $permiso->clases == 1)){{ old('clases', 'disabled') }}@endif>
                                    <option value='0' @if ((isset($permiso) && $permiso->clases == 0)){{ old('clases', 'selected') }}@endif>0</option>
                                    <option value='1' @if ((isset($permiso) && $permiso->clases == 1)){{ old('clases', 'selected') }}@endif>1</option>
                                    <option value='2' @if ((isset($permiso) && $permiso->clases == 2)){{ old('clases', 'selected') }}@endif>2</option>
                                    <option value='3' @if ((isset($permiso) && $permiso->clases == 3)){{ old('clases', 'selected') }}@endif>3</option>
                                    <option value='4' @if ((isset($permiso) && $permiso->clases == 4)){{ old('clases', 'selected') }}@endif>4</option>
                                    <option value='5' @if ((isset($permiso) && $permiso->clases == 5)){{ old('clases', 'selected') }}@endif>5</option>
                                    <option value='6' @if ((isset($permiso) && $permiso->clases == 6)){{ old('clases', 'selected') }}@endif>6</option>
                                    <option value='7' @if ((isset($permiso) && $permiso->clases == 7)){{ old('clases', 'selected') }}@endif>7</option>
                                    <option value='8' @if ((isset($permiso) && $permiso->clases == 8)){{ old('clases', 'selected') }}@endif>8</option>
                                    <option value='9' @if ((isset($permiso) && $permiso->clases == 9)){{ old('clases', 'selected') }}@endif>9</option>
                                    <option value='10' @if ((isset($permiso) && $permiso->clases == 10)){{ old('clases', 'selected') }}@endif>10</option>
                                    <option value='15' @if ((isset($permiso) && $permiso->clases == 15)){{ old('clases', 'selected') }}@endif>15</option>
                                    <option value='20' @if ((isset($permiso) && $permiso->clases == 20)){{ old('clases', 'selected') }}@endif>20</option>
                                    <option value='25' @if ((isset($permiso) && $permiso->clases == 25)){{ old('clases', 'selected') }}@endif>25</option>
                                </select>

                                @error('clases')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="oferta" class="col-md-4 col-form-label text-md-right text-center">{{ __('¿Oferta?') }}</label>

                            <div class="col-md-6">
                                <select id="oferta" name="oferta" class="form-control @error('oferta') is-invalid @enderror" @if ((isset($permiso) && $permiso->oferta == 1)){{ old('oferta') }}@endif>
                                    <option value='1' @if ((isset($permiso) && $permiso->oferta == 1)){{ old('oferta', 'selected') }}@endif>Si</option>
                                    <option value='2' @if ((isset($permiso) && $permiso->oferta == 2)){{ old('oferta', 'selected') }}@endif>No</option>
                                </select>

                                @error('practico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarpermiso/*'))
                                        {{ __('Editar Permiso') }}
                                    @else
                                        {{ __('Añadir Permiso') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../permisos" class="btn color wow fadeInLeft">Cancelar</a>
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
            precioIva();
        });
    </script>
@endpush
