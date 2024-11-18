@extends('layouts.layout')

@section('title', 'Editar producto')

@section('content')
    <div class="row text-center">
        <h1>Editar producto</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ route('producto.update', $producto->id) }}">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}">
                </div>
                <div class="mb-3">
                    <label for="descripción" class="form-label">Descripsion</label>
                    <input type="text" class="form-control" id="descripción" name="descripcion" value="{{ $producto->descripcion }}">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}">
                </div>
                <div class="row justify-content-between">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-warning" href="{{ route('producto.index') }}">Ver productos</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
