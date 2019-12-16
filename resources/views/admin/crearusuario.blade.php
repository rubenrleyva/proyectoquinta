@extends('admin.bienvenido')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (isset($usuario))
                        <form name="editarusuario" method="POST" action="{{ route('admin.actualizarusuarioeditado.guardar', ['usuario'=>$usuario]) }}" enctype="multipart/form-data">
                    @else
                        <form name="crearusuario" method="POST" action="{{ route('admin.guardarusuario.guardar') }}" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="form-group row">
                            @if (!isset($usuario) || !file_exists($usuario->foto->url_foto))
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
                            @elseif(file_exists($usuario->foto->url_foto))
                            <div class="col-md-4 offset-md-4 text-center wow fadeInLeft" id="popbutton">
                                    <img name="fotos" class="mg-fluid rounded mx-auto d-block" src=" @if (isset($usuario)) {{ '/'.$usuario->foto->url_foto }}  @endif" alt="">
                                    <i class="icofont icofont-close"></i>
                                </div>
                            @endif 
                        </div>

                        <div class="form-group row">
                            <label for="tipousuario" class="col-md-4 col-form-label text-md-right text-center">{{ __('Tipo Usuario') }}</label>
                            <div class="col-md-6">
                                <select id="tipousuario" name="tipousuario" class="form-control @error('tipousuario') is-invalid @enderror" required>
                                    <option value='2' @if ((isset($usuario) && $usuario->tipousuario == 2)){{ old('tipousuario', 'selected') }}@else{{old('tipousuario', 'selected')}}@endif>Alumno</option>     
                                    <option value='1' @if ((isset($usuario) && $usuario->tipousuario == 1)){{ old('tipousuario', 'selected') }}@else{{old('tipousuario', 'selected')}}@endif>Profesor</option>
                                </select>

                                @error('tipousuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right text-center">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if(isset($usuario)){{ old('name', $usuario->name) }}@else{{old('name')}}@endif" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right text-center">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="@if(isset($usuario)){{ old('apellidos', $usuario->apellidos) }}@else{{old('apellidos')}}@endif" required autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-center">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(isset($usuario)){{ old('email', $usuario->email) }}@else{{old('email')}}@endif" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-center">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" @if (isset($usuario)){{ "" }}@else {{ "required" }} @endif autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-center">{{ __('Repetir Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" @if (isset($usuario)){{ "" }}@else {{ "required" }} @endif autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right text-center">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="@if (isset($usuario)){{ old('dni', $usuario->dni) }}@else{{old('dni')}}@endif" required>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domicilio" class="col-md-4 col-form-label text-md-right text-center">{{ __('Domicilio') }}</label>

                            <div class="col-md-6">
                                <input id="domicilio" type="domicilio" class="form-control @error('domicilio') is-invalid @enderror" name="domicilio" value="@if (isset($usuario)){{ old('domicilio', $usuario->domicilio) }}@else{{old('domicilio')}}@endif" required>

                                @error('domicilio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fechanacimiento" class="col-md-4 col-form-label text-md-right text-center">{{ __('Fecha de Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fechanacimiento" type="date" class="form-control @error('fechanacimiento') is-invalid @enderror" name="fechanacimiento" value="@if (isset($usuario)){{ old('fechanacimiento', $usuario->fechanacimiento) }}@else{{old('fechanacimiento')}}@endif" min="1950-03-25" required>

                                @error('fechanacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right text-center">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="@if (isset($usuario)){{ old('telefono', $usuario->telefono) }}@else{{old('telefono')}}@endif" pattern="[0-9]{9}" required>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="localidad" class="col-md-4 col-form-label text-md-right text-center">{{ __('Localidad') }}</label>

                            <div class="col-md-6">
                                <input id="localidad" type="text" class="form-control @error('localidad') is-invalid @enderror" name="localidad" value="@if (isset($usuario)){{ old('localidad', $usuario->localidad) }}@else{{old('localidad')}}@endif" required>

                                @error('localidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="codigopostal" class="col-md-4 col-form-label text-md-right text-center">{{ __('Código Postal') }}</label>

                            <div class="col-md-6">
                                <input id="codigopostal" type="text" class="form-control @error('codigopostal') is-invalid @enderror" name="codigopostal" value="@if (isset($usuario)){{ old('codigopostal', $usuario->codigopostal) }}@else{{old('codigopostal')}}@endif" pattern="[0-9]{5}" required>

                                @error('codigopostal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="datosextra">
                            <div class="form-group row">
                                <label for="matricula" class="col-md-4 col-form-label text-md-right text-center">{{ __('Matrícula') }}</label>

                                <div class="col-md-6">
                                        <input id="matricula" type="matricula" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="@if (isset($usuario)){{ old('matricula', $usuario->matricula) }}@else{{old('matricula')}}@endif">

                                    @error('matricula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="teorico" class="col-md-4 col-form-label text-md-right text-center">{{ __('Teórico') }}</label>

                                <div class="col-md-6">
                                    <select id="teorico" name="teorico" class="form-control @error('teorico') is-invalid @enderror">
                                        @if ((isset($usuario) && $usuario->tipousuario == 1))
                                            <option value='0' selected>No procede</option>                                     
                                        @endif
                                        <option value='1' @if ((isset($usuario) && $usuario->teorico == 1)){{ old('teorico', 'selected') }}@else{{old('teorico', 'selected')}}@endif>Aprobado</option>
                                        <option value='2' @if ((isset($usuario) && $usuario->teorico == 2)){{ old('teorico', 'selected') }}@else{{old('teorico', 'selected')}}@endif>No aprobado</option>
                                    </select>

                                    @error('teorico')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="practico" class="col-md-4 col-form-label text-md-right text-center">{{ __('Práctico') }}</label>

                                <div class="col-md-6">
                                    <select id="practico" name="practico" class="form-control @error('practico') is-invalid @enderror">
                                        @if ((isset($usuario) && $usuario->tipousuario == 1))
                                            <option value='0' selected>No procede</option>                                     
                                        @endif
                                        <option value='1' @if ((isset($usuario) && $usuario->practico == 1)){{ old('practico', 'selected') }}@else{{old('teorico', 'selected')}}@endif>Aprobado</option>
                                        <option value='2' @if ((isset($usuario) && $usuario->practico == 2)){{ old('practico', 'selected') }}@else{{old('teorico', 'selected')}}@endif>No aprobado</option>
                                    </select>

                                    @error('practico')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarusuario/*'))
                                        {{ __('Editar Usuario') }}
                                    @else
                                        {{ __('Añadir Usuario') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../usuarios" class="btn color wow fadeInLeft">Cancelar</a>
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
