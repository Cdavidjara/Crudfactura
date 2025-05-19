<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Factura;

class FacturaTest extends TestCase
{
    public function test_validaciones_factura()
    {
        // Traer todas las facturas con su relación cliente
        $facturas = Factura::with('cliente')->get();

        foreach ($facturas as $factura) {
            // Validar campos numéricos y fecha
            $this->assertIsNumeric($factura->subtotal, "Factura ID {$factura->id}: El subtotal no es numérico.");
            $this->assertIsNumeric($factura->iva, "Factura ID {$factura->id}: El IVA no es numérico.");
            $this->assertIsNumeric($factura->total, "Factura ID {$factura->id}: El total no es numérico.");

            $this->assertEquals(
                $factura->subtotal + $factura->iva,
                $factura->total,
                "Factura ID {$factura->id}: El total no corresponde a subtotal + IVA."
            );

            $this->assertMatchesRegularExpression(
                '/^\d{4}-\d{2}-\d{2}$/',
                $factura->fechaVenta,
                "Factura ID {$factura->id}: La fecha de venta tiene un formato inválido."
            );

            // Validar nombre del cliente asociado (solo letras y espacios)
            $nombreCliente = $factura->cliente->nombre ?? '';
            $this->assertMatchesRegularExpression(
                '/^[a-zA-Z\s]+$/',
                $nombreCliente,
                "Factura ID {$factura->id}: El cliente con ID {$factura->cliente_id} tiene un nombre inválido: '{$nombreCliente}'."
            );
        }
    }
}
