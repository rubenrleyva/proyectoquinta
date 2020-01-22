@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5">
    @if ($usuario)
    <div class="row-fluid">
        <div class="col-12">
            <div class="card">
                @if (session()->has('respuesta'))
                    <div class="alert alert-success text-center">
                        {{ session('respuesta') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="blog-wrapper row mb-20">
                        @if (isset($tests))
                            @foreach ($tests as $test)
                                <div class="blog-item col-lg-4 col-md-6 col-12">
                                    <a href="blog-details.html" class="image">
                                        <img src="img/blog/7.jpg" alt="">
                                        <i class="icofont icofont-link-alt"></i>
                                    </a>
                                    <div class="meta fix">
                                    <p class="float-left">{{ $test->created_at }}</p>
                                        <p class="float-right">
                                            <a href="#"><i class="icofont icofont-thumbs-up"></i> 25 likes</a>
                                            <a href="#"><i class="icofont icofont-speech-comments"></i> 42 comments</a>
                                        </p>
                                    </div>
                                    <h5 class="title"><a href="blog-details.html">we have replaced by new design</a></h5>
                                    <div class="description">
                                        <p>Eu ferri brute mentitum vel. Pro oporteat persequ menandri deterruisset ei mei. An omnium fuisset pro An orfez way to oporteat...</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            Sin test
                        @endif
                        
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
