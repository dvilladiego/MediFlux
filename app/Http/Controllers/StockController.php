<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Stock;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StockController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::with('stock')->get();

        return view('stocks', compact('medicamentos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Cantidad_Disponible' => 'required|numeric|min:0',
            'Cantidad_Minima_Requerida' => 'required|numeric|min:0',
            'Cantidad' => 'required|numeric|min:0', 
            'Unidades' => 'required|string|max:50', 
        ]);

        $medicamento = Medicamento::findOrFail($id);

        Stock::updateOrCreate(
            ['ID_Medicamento' => $medicamento->ID_Medicamento],
            [
                'Cantidad_Disponible' => $request->Cantidad_Disponible,
                'Cantidad_Minima_Requerida' => $request->Cantidad_Minima_Requerida
            ]
        );

        $medicamento->update([
            'Cantidad' => $request->Cantidad, 
            'Unidades' => $request->Unidades, 
        ]);

        Alert::success('Éxito', 'Stock actualizado correctamente.');
        return redirect()->route('stock.index'); 
    }


    public function delete($id)
    {
        Stock::where('ID_Medicamento', $id)->delete();

        Alert::success('Éxito', 'Stock eliminado correctamente.');
        return redirect()->route('stock.index'); 
    }
}
