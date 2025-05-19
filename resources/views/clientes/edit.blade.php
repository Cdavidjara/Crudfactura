@extends('layouts.app')

@section('content')
    <h1>Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $cliente->nombre) }}"><br>
        <button type="submit">Guardar Cambios</button>
    </form>
@endsection
