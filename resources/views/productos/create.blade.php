@extends('layouts.layout')

@section('title', 'creación de producto')

@section('content')
    <div class="row text-center">
        <h1>Registrar producto</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{route('producto.store')}}">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="descripción" class="form-label">Descripsion</label>
                    <input type="text" class="form-control" id="descripción" name="descripcion">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio">
                </div>
                <div class="row justify-content-between">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-warning" href="{{ route('producto.index') }}">Ver productos</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
