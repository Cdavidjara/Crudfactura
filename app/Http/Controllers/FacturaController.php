<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Cliente;

class FacturaController extends Controller
{
    public function index()
    {
        // Cargar facturas con la relación cliente para mostrar nombre
        $facturas = Factura::with('cliente')->get();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('facturas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|integer|exists:clientes,id',
            'fechaVenta' => 'required|date',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
        ]);

        $total = $validated['subtotal'] + $validated['iva'];

        Factura::create([
            'cliente_id' => $validated['cliente_id'],
            'fechaVenta' => $validated['fechaVenta'],
            'subtotal' => $validated['subtotal'],
            'iva' => $validated['iva'],
            'total' => $total,
        ]);

        return redirect()->route('facturas.index')->with('success', 'Factura creada correctamente.');
    }

    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        $clientes = Cliente::all();
        return view('facturas.edit', compact('factura', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|integer|exists:clientes,id',
            'fechaVenta' => 'required|date',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
        ]);

        $factura = Factura::findOrFail($id);

        $total = $validated['subtotal'] + $validated['iva'];

        $factura->update([
            'cliente_id' => $validated['cliente_id'],
            'fechaVenta' => $validated['fechaVenta'],
            'subtotal' => $validated['subtotal'],
            'iva' => $validated['iva'],
            'total' => $total,
        ]);

        return redirect()->route('facturas.index')->with('success', 'Factura actualizada correctamente.');
    }

    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();

        return redirect()->route('facturas.index')->with('success', 'Factura eliminada correctamente.');
    }
}
