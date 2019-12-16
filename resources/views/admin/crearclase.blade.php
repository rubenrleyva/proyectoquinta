@extends('admin.bienvenido')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (isset($clase))
                        <form name="editarclase" method="POST" action="{{ route('admin.guardarclaseeditado.guardar', ['clase'=>$clase]) }}">
                    @else
                        <form name="crearclase" method="POST" action="{{ route('admin.guardarclase.guardar') }}">
                    @endif
                        @csrf

                        <div class="form-group row">
                            <label for="alumno" class="col-md-4 col-form-label text-md-right text-center">{{ __('Nombre alumno') }}</label>

                            <div class="col-md-6">
                                <select id="alumno" name="alumno" class="form-control @error('alumno') is-invalid @enderror">
                                    @foreach ($usuarios as $usuario)
                                        <option value='{{ $usuario->id }}'>{{ $usuario->name }}</option>
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
                            <label for="profesor" class="col-md-4 col-form-label text-md-right text-center">{{ __('Nombre profesor') }}</label>

                            <div class="col-md-6">
                                <input id="profesor" type="text" class="form-control @error('profesor') is-invalid @enderror" name="profesor" value="@if (isset($profesor)){{ old('profesor', $profesor->name) }}@else{{ old('profesor') }} @endif" readonly autocomplete="profesor" autofocus>

                                @error('profesor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         
                        <div class="form-group row">
                            <label for="comentarios" class="col-md-4 col-form-label text-md-right text-center">{{ __('Comentario') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="comentarios" type="text" class="form-control @error('comentarios') is-invalid @enderror" name="comentarios" value="@if (isset($clase)){{ old('comentarios', $clase->comentarios) }}@else{{ old('comentarios') }} @endif" required autocomplete="comentarios" autofocus> --}}
                                <textarea id="comentarios" name="comentarios" class="form-control @error('comentarios') is-invalid @enderror" placeholder="Comentario de la clase prática"></textarea>
                                @error('comentarios')
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

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarclase/*'))
                                        {{ __('Editar Clase') }}
                                    @else
                                        {{ __('Añadir Clase') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../clasespracticas" class="btn color wow fadeInLeft">Cancelar</a>
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
        });
    </script>
@endpush
