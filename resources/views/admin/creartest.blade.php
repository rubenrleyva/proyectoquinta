@extends('admin.bienvenido')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card py-3">
                <div class="card-body">
                    @if (isset($test))
                        <form name="editarencuesta" method="POST" action="{{ route('admin.guardartesteditado.guardar', ['test'=>$test]) }}">
                    @else
                         <form name="crearencuesta" method="POST" action="{{ route('admin.guardartest.guardar') }}">
                    @endif
                        @csrf
                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right text-center">{{ __('Tipo test') }}</label>
                            <div class="col-md-4">
                                <select id="tipo" name="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                                    <option value='Programado' @if ((isset($test) && $test->tipo == 'Programado')){{ old('tipo', 'selected') }}@endif>Test programado</option>     
                                    <option value='Examen' @if ((isset($test) && $test->tipo == 'Programado')){{ old('tipo', 'selected') }}@endif>Test examen</option>
                                </select>
                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="permiso" class="col-md-4 col-form-label text-md-right text-center">{{ __('Tipo Permiso') }}</label>
                            <div class="col-md-4">
                                <select id="permiso" name="permiso" class="form-control @error('permiso') is-invalid @enderror" required>
                                    <option value='B' @if ((isset($test) && $test->permiso == 'B')){{ old('permiso', 'selected') }}@endif>Permiso B</option>     
                                    <option value='A.M' @if ((isset($test) && $test->permiso == 'A.M')){{ old('permiso', 'selected') }}@endif>Permiso A.M</option>
                                    <option value='A1/A2' @if ((isset($test) && $test->permiso == 'A1/A2')){{ old('permiso', 'selected') }}@endif>Permiso A1/A2</option>
                                    <option value='B.T.P' @if ((isset($test) && $test->permiso == 'B.T.P')){{ old('permiso', 'selected') }}@endif>Permiso B.T.P</option>
                                    <option value='C1/C/D1/D' @if ((isset($test) && $test->permiso == 'C1/C/D1/D')){{ old('permiso', 'selected') }}@endif>Permiso C1/C/D1/D</option>
                                    <option value='E' @if ((isset($test) && $test->permiso == 'E')){{ old('permiso', 'selected') }}@endif>Permiso E</option>
                                </select>
                                @error('permiso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label align-middle text-right">{{ __('Título del test') }}</label>
                            <div class="col-md-4">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="@if (isset($test)){{ old('titulo', $test->titulo) }}@endif" required placeholder='Nombre del test' autocomplete="titulo" autofocus>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label align-middle text-right">{{ __('Número de test') }}</label>
                            <div class="col-md-1">
                                <input id='numero' type='text' class='form-control text-center @error('numero') is-invalid @enderror' name='numero' value="@if (isset($test)){{ old('numero', $test->numero) }}@endif" autocomplete='numero' placeholder='Nº' autofocus>

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarencuesta/*'))
                                        {{ __('Editar test') }}
                                    @else
                                        {{ __('Añadir test') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../tests" class="btn color wow fadeInLeft">Cancelar</a>
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
            nuevaPreguntasEncuesta();
            nuevaRespuestasEncuesta();          
        });
    </script>
@endpush
