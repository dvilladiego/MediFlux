<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Medicamento;
use App\Models\Stock;
use App\Models\Alerta;
use App\Exports\ReporteExport;
use PDF;

class ReporteController extends Controller
{
    public function generarReporte(Request $request)
    {
        $request->validate([
            'tipo_reporte' => 'required',
            'formato' => 'required',
        ]);

        $tipo_reporte = $request->input('tipo_reporte');
        $formato = $request->input('formato');

        if ($tipo_reporte == 'medicamentos') {
            $data = $this->obtenerMedicamentos();
        } elseif ($tipo_reporte == 'stock') {
            $data = $this->obtenerStock();
        } elseif ($tipo_reporte == 'alertas') {
            $data = $this->obtenerAlertas();
        } else {
            return response()->json(['error' => 'Tipo de reporte no válido.'], 400);
        }

        try {
            if ($formato == 'pdf') {
                $pdf = PDF::loadView('pdf', compact('data', 'tipo_reporte'));
                return $pdf->download('reporte-' . $tipo_reporte . '.pdf');
            } elseif ($formato == 'excel') {
                if (is_null($data)) {
                    return response()->json(['error' => 'No se encontraron datos para el reporte.'], 404);
                }
                return Excel::download(new ReporteExport($data, $tipo_reporte), 'reporte-' . $tipo_reporte . '.xlsx');
            } else {
                return response()->json(['error' => 'Formato no válido.'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    protected function obtenerMedicamentos()
    {
        return Medicamento::all(); 
    }

    protected function obtenerStock()
    {
        return Stock::all();
    }

    protected function obtenerAlertas()
    {
        return Alerta::all(); 
    }
}
