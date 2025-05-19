<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cliente;

class ClienteTest extends TestCase
{
    public function test_nombres_clientes_sin_numeros()
    {
        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            $this->assertMatchesRegularExpression('/^[a-zA-Z\s]+$/', $cliente->nombre, "El cliente con id {$cliente->id} tiene un nombre inválido.");
        }
    }
}
