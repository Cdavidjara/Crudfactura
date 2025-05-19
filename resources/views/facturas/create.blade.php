<!DOCTYPE html>
<html>
<head>
    <title>Crear Factura</title>
</head>
<body>
    <h1>Crear nueva factura</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('facturas.store') }}" method="POST">
        @csrf
        <label>Cliente:</label>
        <select name="cliente_id" required>
            <option value="">Seleccione un cliente</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
            @endforeach
        </select><br>

        <label>Fecha de Venta:</label>
        <input type="date" name="fechaVenta" required><br>

        <label>Subtotal:</label>
        <input type="number" name="subtotal" required step="0.01"><br>

        <label>IVA:</label>
        <input type="number" name="iva" required step="0.01"><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('facturas.index') }}">Volver</a>
</body>
</html>
