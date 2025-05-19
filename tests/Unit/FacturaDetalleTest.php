<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\FacturaDetalle;

class FacturaDetalleTest extends TestCase
{
    public function test_validaciones_factura_detalle()
    {
        // Traer todos los detalles con su relación producto
        $detalles = FacturaDetalle::with('producto')->get();

        foreach ($detalles as $detalle) {
            // Validación de cantidad
            $this->assertIsNumeric($detalle->cantidad, "El detalle con ID {$detalle->id} tiene una cantidad no numérica.");
            $this->assertGreaterThan(0, $detalle->cantidad, "El detalle con ID {$detalle->id} tiene una cantidad no válida.");

            // Validación de valor unitario
            $this->assertIsNumeric($detalle->Vunitario, "El detalle con ID {$detalle->id} tiene un valor unitario no numérico.");
            $this->assertGreaterThanOrEqual(0, $detalle->Vunitario, "El detalle con ID {$detalle->id} tiene un valor unitario negativo.");

            // Validación de valor total
            $this->assertIsNumeric($detalle->valorTotal, "El detalle con ID {$detalle->id} tiene un valor total no numérico.");
            $this->assertEquals(
                $detalle->cantidad * $detalle->Vunitario,
                $detalle->valorTotal,
                "El valor total del detalle con ID {$detalle->id} no corresponde con cantidad x valor unitario."
            );

            // Validación del nombre del producto (solo letras y espacios)
            $nombreProducto = $detalle->producto->nombre ?? '';
            $this->assertMatchesRegularExpression(
                '/^[a-zA-Z\s]+$/',
                $nombreProducto,
                "El producto con ID {$detalle->producto_id} tiene un nombre inválido: '{$nombreProducto}'."
            );
        }
    }
}
