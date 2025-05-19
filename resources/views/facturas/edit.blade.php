<!DOCTYPE html>
<html>
<head>
    <title>Editar Factura</title>
</head>
<body>
    <h1>Editar factura #{{ $factura->id }}</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('facturas.update', $factura->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Cliente:</label>
        <select name="cliente_id" required>
            <option value="">Seleccione un cliente</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ $factura->cliente_id == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombre }}
                </option>
            @endforeach
        </select><br>

        <label>Fecha de Venta:</label>
        <input type="date" name="fechaVenta" value="{{ $factura->fechaVenta }}" required><br>

        <label>Subtotal:</label>
        <input type="number" name="subtotal" value="{{ $factura->subtotal }}" required step="0.01"><br>

        <label>IVA:</label>
        <input type="number" name="iva" value="{{ $factura->iva }}" required step="0.01"><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('facturas.index') }}">Volver</a>
</body>
</html>
