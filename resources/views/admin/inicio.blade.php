@extends('admin.bienvenido')

@section('contenido')
<div class="container-fluid pt-5 py-3">
    <div class="row-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h4>Bienvenido {{ auth()->user()->name }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
