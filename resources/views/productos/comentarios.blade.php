@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Comentarios para {{ $producto->nombre }}</h3>
    @forelse($producto->comentarios as $comentario)
        <div>
            <strong>{{ $comentario->usuario->nombre }}</strong>
            <p>{{ $comentario->contenido }}</p>
        </div>
    @empty
        <p>No hay comentarios para este producto.</p>
    @endforelse
    <a href="{{ route('productos.show', $producto) }}" class="btn btn-secondary">Volver al Producto</a>
</div>
@endsection
