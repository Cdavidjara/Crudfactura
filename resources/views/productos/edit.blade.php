@extends('layouts.app')

@section('content')
    <h1>Editar producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" required><br>
        <label>Precio:</label>
        <input type="number" name="precio" value="{{ $producto->precio }}" step="0.01" required><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('productos.index') }}">🔙 Volver</a>
@endsection
