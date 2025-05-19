<!DOCTYPE html>
<html>
<head>
    <title>Lista de Facturas</title>
</head>
<body>
    <h1>Facturas</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('facturas.create') }}">Crear nueva factura</a>

    <ul>
        @foreach ($facturas as $factura)
            <li>
                Factura #{{ $factura->id }} - 
                Cliente: {{ $factura->cliente->nombre ?? 'Sin cliente' }} - 
                Fecha: {{ $factura->fechaVenta }} - 
                Subtotal: ${{ number_format($factura->subtotal, 2) }} - 
                IVA: ${{ number_format($factura->iva, 2) }} - 
                Total: ${{ number_format($factura->total, 2) }}
                | <a href="{{ route('facturas.edit', $factura->id) }}">Editar</a>
                | 
                <form action="{{ route('facturas.destroy', $factura->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar factura?')">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
