@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $producto->nombre }}</h1>
    <p>{{ $producto->descripcion }}</p>
    <p>Categoría: {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
    <p>Precio: ${{ number_format($producto->precio, 2) }}</p>
    
    <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver al listado</a>
    <a href="{{ route('productos.comentarios', $producto) }}" class="btn btn-info">Ver Comentarios</a>
</div>
@endsection
