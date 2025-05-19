<!DOCTYPE html>
<html>
<head>
    <title>Editar Detalle de Factura</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        label { display: block; margin-top: 10px; }
        input, select { padding: 5px; width: 200px; }
        button { margin-top: 15px; padding: 8px 15px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Editar detalle de factura #{{ $detalle->id }}</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('factura_detalles.update', $detalle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Factura:</label>
        <select name="factura_id" required>
            <option value="">Seleccione una factura</option>
            @foreach ($facturas as $factura)
                <option value="{{ $factura->id }}" {{ ($detalle->factura_id == $factura->id) ? 'selected' : '' }}>
                    Factura #{{ $factura->id }}
                </option>
            @endforeach
        </select>

        <label>Producto:</label>
        <select name="producto_id" required>
            <option value="">Seleccione un producto</option>
            @foreach ($productos as $producto)
                <option value="{{ $producto->id }}" {{ ($detalle->producto_id == $producto->id) ? 'selected' : '' }}>
                    {{ $producto->nombre }}
                </option>
            @endforeach
        </select>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" required min="1" value="{{ old('cantidad', $detalle->cantidad) }}">

        <label>Precio Unitario:</label>
        <input type="number" name="Vunitario" required step="0.01" value="{{ old('Vunitario', $detalle->Vunitario) }}">

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('factura_detalles.index') }}">Volver</a>
</body>
</html>
