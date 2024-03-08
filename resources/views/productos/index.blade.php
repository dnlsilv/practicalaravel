@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Productos</h2>
    @foreach($productos as $producto)
        <div>
            <a href="{{ route('productos.show', $producto) }}">{{ $producto->nombre }}</a>
            <a href="{{ route('productos.comentarios', $producto) }}" class="btn btn-info btn-sm">Comentarios</a>
        </div>
    @endforeach
</div>
@endsection
