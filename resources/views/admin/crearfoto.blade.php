@extends('admin.bienvenido')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (isset($foto))
                        <form name="editarfoto" method="POST" action="{{ route('admin.guardarfotoeditado.guardar', ['foto'=>$foto]) }}" enctype="multipart/form-data">
                    @else
                        <form name="crearfoto" method="POST" action="{{ route('admin.guardarfoto.guardar') }}" enctype="multipart/form-data">
                    @endif
                        @csrf

                        <div class="form-group row">
                            <label for="tipofoto" class="col-md-4 col-form-label text-md-right text-center">{{ __('Tipo foto') }}</label>
                            <div class="col-md-4">
                                <select id="tipofoto" name="tipofoto" class="form-control @error('tipofoto') is-invalid @enderror" required>
                                    <option value='estudiantes' @if ((isset($foto) && $foto->tipo_foto == "estudiantes")){{ old('tipofoto', 'selected') }}@endif>Estudiantes</option>
                                    <option value='profesores' @if ((isset($foto) && $foto->tipo_foto == "profesores")){{ old('tipofoto', 'selected') }}@endif>Profesores</option>
                                    <option value='coches' @if ((isset($foto) && $foto->tipo_foto == "coches")){{ old('tipofoto', 'selected') }}@endif>Coches</option>
                                    <option value='instalaciones' @if ((isset($foto) && $foto->tipo_foto == "instalacines")){{ old('tipofoto', 'selected') }}@endif>Instalaciones</option>
                                    <option value='examenes' @if ((isset($foto) && $foto->tipo_foto == "examenes")){{ old('tipofoto', 'selected') }}@endif>Exámenes</option>
                                    <option value='otros' @if ((isset($foto) && $foto->tipo_foto == "otros")){{ old('tipofoto', 'selected') }}@endif>Otros</option>
                                </select>

                                @error('tipofoto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto" class="col-md-4 col-form-label text-md-right text-center">{{ __('Texto') }}</label>

                            <div class="col-md-6">
                                <input id="texto" type="text" class="form-control @error('texto') is-invalid @enderror" name="texto" value="@if (isset($permiso)){{ old('texto', $permiso->texto1) }}@else{{ old('texto') }}@endif" autocomplete="texto" autofocus>

                                @error('texto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            @if (!isset($foto) || !file_exists($foto->url_foto) || !file_exists($foto->url_foto == "img/sin-foto.png"))
                                @if (session()->has('respuestafotos'))
                                    <div class="alert alert-success text-center">
                                        {{ session('respuestafotos') }}
                                    </div>
                                @endif
                                <label for="file" class="col-md-4 col-form-label text-md-right text-center">Añade una foto: </label>
                                <input type="file" name="foto" class="foto {{ $errors->has('foto') ? ' is-invalid' : '' }} btn btn-primary btn-sx text-uppercase" value="Insertar una imagen" accept="image/*" required/>
                                @if ($errors->has('foto'))
                                    <br>
                                    <strong style="color: red;">{{ $errors->first('foto') }}</strong>
                                @endif
                            @elseif(file_exists($foto->url_foto))
                            <div class="col-md-4 offset-md-4 text-center wow fadeInLeft" id="popbutton">
                                    <img name="fotos" class="mg-fluid rounded mx-auto d-block" src=" @if (isset($foto)) {{ '/'.$foto->url_foto }}  @endif" alt="">
                                    <i class="icofont icofont-close"></i>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarfoto/*'))
                                        {{ __('Editar Foto') }}
                                    @else
                                        {{ __('Añadir Foto') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../fotos" class="btn color wow fadeInLeft">Cancelar</a>
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
            @if (isset($usuario->foto->url_foto))
                borrarFoto('{{route('admin.borrarfoto.borrar', $usuario)}}');
            @endif
        });
    </script>
@endpush
