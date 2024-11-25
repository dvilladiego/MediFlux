<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Stock;
use App\Models\Alerta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MedicamentoController extends Controller
{
    // REGISTRO DE MEDICAMENTO
    public function index()
    {
        $medicamentos = Medicamento::orderBy('created_at', 'desc')->take(5)->get();
        return view('medicamentos', ['medicamentos' => $medicamentos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Codigo' => 'required|string|max:255',
            'Descripcion' => 'required|string|max:255',
            'Cantidad' => 'required|integer|min:1',
            'Unidades' => 'required|string|max:255',
            'Fecha_Vencimiento' => 'required|date',
        ]);

        $medicamentoExistente = Medicamento::where('Nombre', $request->input('Nombre'))
            ->where('Codigo', $request->input('Codigo'))
            ->first();

        if ($medicamentoExistente) {
            $medicamentoExistente->update([
                'Descripcion' => $request->input('Descripcion'),
                'Cantidad' => $request->input('Cantidad'),
                'Unidades' => $request->input('Unidades'),
                'Fecha_Vencimiento' => $request->input('Fecha_Vencimiento'),
            ]);

            Alert::success('Éxito', 'El medicamento ya tiene el nombre y el código, se editó la descripción y otros campos.');
            return redirect()->back();
        }

        Medicamento::create([
            'Nombre' => $request->input('Nombre'),
            'Codigo' => $request->input('Codigo'),
            'Descripcion' => $request->input('Descripcion'),
            'Cantidad' => $request->input('Cantidad'),
            'Unidades' => $request->input('Unidades'),
            'Fecha_Vencimiento' => $request->input('Fecha_Vencimiento'),
        ]);

        Alert::success('Éxito', 'Medicamento registrado exitosamente.');
        return redirect()->back();
    }

    public function buscar(Request $request)
    {
        // Buscar medicamentos cuyo nombre contenga el término de búsqueda
        $query = $request->input('query');
        $medicamentos = Medicamento::where('Nombre', 'LIKE', "%{$query}%")
            ->orWhere('Codigo', 'LIKE', "%{$query}%")
            ->get();

        // Devolver los resultados como JSON para la respuesta AJAX
        return response()->json($medicamentos);
    }
}
