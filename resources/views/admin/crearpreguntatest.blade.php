@extends('admin.bienvenido')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (session()->has('respuesta'))
                    <div class="alert alert-success text-center">
                        {{ session('respuesta') }}
                    </div>
                @endif
                <div class="card-body">
                    @if (isset($pregunta))
                        <form name="editartest" method="POST" action="{{ route('admin.guardarpreguntaeditada.editar', ['id'=>$test->id]) }}" enctype="multipart/form-data">
                    @else
                        <form name="creartest" method="POST" action="{{ route('admin.guardarpreguntatest.guardar', ['id'=>$test->id]) }}" enctype="multipart/form-data">  
                    @endif
                        @csrf
                        <div class="form-group row">
                            <label for="titulo" class="col-md-12 col-form-label font-weight-bold text-uppercase text-center">Test {{ __($test->tipo) }} {{ __($test->titulo) }}</label>
                        </div>
                        <div class="form-group row mb-3">
                            <input id='id_pregunta' type='hidden' name='id_pregunta' value='@if (isset($pregunta)){{ old('id_pregunta', $test->id) }}@endif'>
                            <div class=" card col-md-2">
                                <label for='pregunta' class='col-md-12 col-form-label text-center'>Pregunta</label>
                            </div>
                            <div class="col-md-10">
                                <input id="pregunta" type="text" class="form-control @error('pregunta') is-invalid @enderror" name="pregunta" value="@if (isset($pregunta)){{ old('pregunta', $pregunta->pregunta) }}@endif" required autocomplete="pregunta">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <img class="rounded mx-auto d-block" id="preview" src="" alt="" />
                            </div> 
                        </div>
                        <div class="form-group row mb-4">
                            @if (!isset($pregunta) || !file_exists($pregunta->foto->url_foto))
                                @if (session()->has('respuestafotos'))
                                    <div class="alert alert-success text-center">
                                        {{ session('respuestafotos') }}
                                    </div>
                                @endif
                                <label for="file" class="col-md-4 col-form-label text-md-right text-center">Añade una foto: </label>
                                <input type="file" id="imagen" name="foto" class="foto {{ $errors->has('foto') ? ' is-invalid' : '' }} btn btn-primary btn-sx text-uppercase" value="Insertar una imagen" accept="image/*"/>
                                @if ($errors->has('foto'))
                                    <br>
                                    <strong style="color: red;">{{ $errors->first('foto') }}</strong>
                                @endif
                            @elseif(file_exists($pregunta->foto->url_foto))
                            <div class="col-md-4 offset-md-4 text-center wow fadeInLeft" id="popbutton">
                                    <img name="fotos" class="mg-fluid rounded mx-auto d-block" src=" @if (isset($pregunta)) {{ '/'.$pregunta->foto->url_foto }}  @endif" alt="">
                                    <i class="icofont icofont-close"></i>
                                </div>
                            @endif 
                        </div>

                        <div id='respuesta1' class='form-group row'>
                            <div class=" card col-md-2">
                                <label for='respuesta1' class='col-md-12 col-form-label text-center'>Respuesta</label>
                            </div>
                            <div class='col-md-9'>
                                <input id='respuesta1-texto' type='text' class='form-control @error('respuesta1') is-invalid @enderror' name='respuesta1' value="@if (isset($respuesta1)){{ old('respuesta1', $respuesta1->respuesta) }}@else{{old('respuesta1')}}@endif" autocomplete='respuesta1' autofocus>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="respuesta1-check" name="respuesta-check1" @if ($respuesta1->correcta == 1) checked @endif >
                            </div>
                        </div>

                        <div id='respuesta2' class='form-group row'>
                            <div class=" card col-md-2">
                                <label for='respuesta2' class='col-md-12 col-form-label text-center'>Respuesta</label>
                            </div>
                            <div class='col-md-9'>
                                <input id='respuesta2-texto' type='text' class='form-control @error('respuesta2') is-invalid @enderror' name='respuesta2' value="@if (isset($respuesta2)){{ old('respuesta2', $respuesta2->respuesta) }}@else{{old('respuesta2')}}@endif" autocomplete='respuesta2' autofocus>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="respuesta2-check" name="respuesta-check2" @if ($respuesta2->correcta == 1) checked @endif>
                            </div>
                        </div>

                        <div id='respuesta3' class='form-group row'>
                            <div class=" card col-md-2">
                                <label for='respuesta3' class='col-md-12 col-form-label text-center'>Respuesta</label>
                            </div>
                            <div class='col-md-9'>
                                <input id='respuesta3-texto' type='text' class='form-control @error('respuesta3') is-invalid @enderror' name='respuesta3' value="@if (isset($respuesta3)){{ old('respuesta3', $respuesta3->respuesta) }}@else{{old('respuesta3')}}@endif" autocomplete='respuesta3' autofocus>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="respuesta3-check" name="respuesta-check3" @if ($respuesta3->correcta == 1) checked @endif>
                            </div>
                        </div>

                        <div class="form-group row col-md-offset-1">
                            <div class="col-md-4 offset-md-4 text-center mb-1">
                                <button type="submit" class="btn color wow fadeInLeft">
                                    @if (Request::is('editarpreguntatest/*'))
                                        {{ __('Editar pregunta') }}
                                    @else
                                        {{ __('Guardar pregunta') }}
                                    @endif
                                </button>
                            </div>
                            <div class="col-md-4 offset-md-4 text-center">
                                <a href="../tests" class="btn color wow fadeInLeft">Volver</a>
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
            eleccion();
            $("#imagen").change(function () {
                previewFoto(this);
            });
            @if (isset($pregunta->foto->url_foto))
                borrarFoto('{{route('admin.borrarfoto.borrar', $pregunta)}}');
            @endif
        });
    </script>
@endpush
