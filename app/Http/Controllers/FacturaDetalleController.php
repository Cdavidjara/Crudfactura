<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacturaDetalle;
use App\Models\Factura;
use App\Models\Producto;

class FacturaDetalleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Obtener detalles que tengan productos cuyo nombre coincida con la búsqueda (join con productos)
            $detalles = FacturaDetalle::select('factura_detalles.*')
                ->join('productos', 'factura_detalles.producto_id', '=', 'productos.id')
                ->where('productos.nombre', 'like', "%{$search}%")
                ->get();
        } else {
            $detalles = FacturaDetalle::all();
        }

        return view('factura_detalles.index', compact('detalles'));
    }

    public function create()
    {
        $facturas = Factura::all();
        $productos = Producto::all();
        return view('factura_detalles.create', compact('facturas', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'factura_id' => 'required|integer|exists:facturas,id',
            'producto_id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|numeric|min:1',
            'Vunitario' => 'required|numeric|min:0',
        ]);

        $valorTotal = $request->cantidad * $request->Vunitario;

        FacturaDetalle::create([
            'factura_id' => $request->factura_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'Vunitario' => $request->Vunitario,
            'valorTotal' => $valorTotal,
        ]);

        $factura = Factura::find($request->factura_id);
        $nuevoTotal = FacturaDetalle::where('factura_id', $factura->id)->sum('valorTotal');
        $factura->total = $nuevoTotal;
        $factura->save();

        return redirect()->route('factura_detalles.index');
    }

    public function edit($id)
    {
        $detalle = FacturaDetalle::findOrFail($id);
        $facturas = Factura::all();
        $productos = Producto::all();
        return view('factura_detalles.edit', compact('detalle', 'facturas', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'factura_id' => 'required|integer|exists:facturas,id',
            'producto_id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|numeric|min:1',
            'Vunitario' => 'required|numeric|min:0',
        ]);

        $detalle = FacturaDetalle::findOrFail($id);

        $valorTotal = $validated['cantidad'] * $validated['Vunitario'];

        $detalle->update([
            'factura_id' => $validated['factura_id'],
            'producto_id' => $validated['producto_id'],
            'cantidad' => $validated['cantidad'],
            'Vunitario' => $validated['Vunitario'],
            'valorTotal' => $valorTotal,
        ]);

        $factura = Factura::find($validated['factura_id']);
        $nuevoTotal = FacturaDetalle::where('factura_id', $factura->id)->sum('valorTotal');
        $factura->total = $nuevoTotal;
        $factura->save();

        return redirect()->route('factura_detalles.index');
    }

    public function destroy($id)
    {
        $detalle = FacturaDetalle::findOrFail($id);
        $detalle->delete();

        return redirect()->route('factura_detalles.index')->with('success', 'Detalle eliminado correctamente.');
    }
}
