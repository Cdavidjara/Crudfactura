<!DOCTYPE html>
<html>
<head>
    <title>Detalles de Facturas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; margin: 2px; text-decoration: none; border-radius: 4px; }
        .btn-edit { background-color: #4CAF50; color: white; }
        .btn-delete { background-color: #f44336; color: white; }
        .btn-add { background-color: #008CBA; color: white; padding: 8px 15px; display: inline-block; margin-bottom: 10px; }
        form.inline { display: inline; }
        .search-form { margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Detalles de Facturas</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('factura_detalles.create') }}" class="btn btn-add">Agregar nuevo detalle</a>

    <form method="GET" action="{{ route('factura_detalles.index') }}" class="search-form">
        <input type="text" name="search" placeholder="Buscar por producto" value="{{ $search ?? '' }}">
        <button type="submit">Buscar</button>
        <a href="{{ route('factura_detalles.index') }}">Limpiar</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Factura #</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Valor Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($detalles as $detalle)
                <tr>
                    <td>{{ $detalle->id }}</td>
                    <td>{{ $detalle->factura->id }}</td>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ number_format($detalle->Vunitario, 2) }}</td>
                    <td>{{ number_format($detalle->valorTotal, 2) }}</td>
                    <td>
                        <a href="{{ route('factura_detalles.edit', $detalle->id) }}" class="btn btn-edit">Editar</a>

                        <form action="{{ route('factura_detalles.destroy', $detalle->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que quieres eliminar este detalle?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No se encontraron detalles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
