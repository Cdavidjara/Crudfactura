@extends('layouts.app')

@section('content')
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.create') }}">➕ Agregar nuevo producto</a>
    <ul>
        @foreach ($productos as $producto)
            <li>
                {{ $producto->nombre }} - Precio: ${{ $producto->precio }}
                <a href="{{ route('productos.edit', $producto->id) }}">✏️ Editar</a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro?')">🗑️ Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
