@extends('layouts.app')

@section('content')
    <h1>Crear nuevo producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('productos.index') }}">🔙 Volver</a>
@endsection
