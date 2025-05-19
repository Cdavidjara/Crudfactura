<!-- resources/views/clientes/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        form.inline {
            display: inline;
        }
        .actions button, .actions a {
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 3px;
        }
        .actions button:hover, .actions a:hover {
            background-color: #0056b3;
        }
        .actions button.delete {
            background-color: #dc3545;
        }
        .actions button.delete:hover {
            background-color: #a71d2a;
        }
        .search-bar {
            margin-bottom: 10px;
        }
        .search-bar input[type="text"] {
            padding: 5px;
            width: 250px;
            margin-right: 5px;
        }
        .search-bar button, .search-bar a {
            padding: 6px 12px;
            border: none;
            border-radius: 3px;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }
        .search-bar button {
            background-color: #007bff;
        }
        .search-bar button:hover {
            background-color: #0056b3;
        }
        .search-bar a {
            background-color: #6c757d;
        }
        .search-bar a:hover {
            background-color: #565e64;
        }
        .add-client {
            margin-top: 15px;
            display: inline-block;
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .add-client:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <h1>Clientes</h1>

    <div class="search-bar">
        <form method="GET" action="{{ route('clientes.index') }}" style="display: inline-block;">
            <input type="text" name="search" value="{{ old('search', $search ?? '') }}" placeholder="Buscar por nombre">
            <button type="submit">Buscar</button>
        </form>

        <a href="{{ route('clientes.index') }}">Limpiar</a>
    </div>

    <!-- Mensajes de éxito -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th style="width: 180px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td class="actions">
                        <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este cliente?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No se encontraron clientes.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('clientes.create') }}" class="add-client">Agregar nuevo cliente</a>

</body>
</html>
