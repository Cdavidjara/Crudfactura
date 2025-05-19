<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Producto;

class ProductoTest extends TestCase
{
    public function test_nombre_producto_solo_letras()
    {
        $productos = Producto::all();

        foreach ($productos as $producto) {
            $this->assertMatchesRegularExpression(
                '/^[a-zA-Z\s]+$/',
                $producto->nombre,
                "Producto ID {$producto->id} tiene un nombre inválido: '{$producto->nombre}'. Solo se permiten letras y espacios."
            );
        }
    }
}
