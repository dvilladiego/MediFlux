<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Models\Alerta;
use Carbon\Carbon;

class AlertaController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::all();

        foreach ($medicamentos as $medicamento) {
            $fechaVencimiento = Carbon::parse($medicamento->Fecha_Vencimiento); 
            $diasRestantes = Carbon::now()->diffInDays($fechaVencimiento, false); 

            if ($diasRestantes <= 30) {
                Alerta::updateOrCreate(
                    ['ID_Medicamento' => $medicamento->ID_Medicamento],  
                    [
                        'Dias_Restantes' => $diasRestantes,
                        'Codigo' => $medicamento->Codigo
                    ]
                );
            }
        }

        $alertas = Alerta::with('medicamento')->get();

        return view('alertas', compact('alertas'));
    }

    public function getAlertas()
    {
        $alertas = Alerta::with('medicamento')
            ->where('Dias_Restantes', '<=', 30) 
            ->get();
        return response()->json($alertas);
    }

    public function countAlertas()
    {
        $count = Alerta::where('Dias_Restantes', '<=', 30)->count();
        return response()->json(['count' => $count]);
    }
}


