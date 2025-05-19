<!DOCTYPE html>
<html>
<head>
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Crear nuevo cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('clientes.index') }}">Volver</a>
</body>
</html>
