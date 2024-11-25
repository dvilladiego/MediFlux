<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class EventoController extends Controller
{
    public function guardarEvento(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'nota' => 'nullable|string',
            'tipo' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'hora_inicio' => 'required',
            'fecha_fin' => 'required|date',
            'hora_fin' => 'required',
            'todo_el_dia' => 'required|boolean',
        ]);

        try {
            Evento::create([
                'titulo' => $request->titulo,
                'nota' => $request->nota,
                'tipo' => $request->tipo,
                'fecha_inicio' => $request->fecha_inicio,
                'hora_inicio' => $request->hora_inicio,
                'fecha_fin' => $request->fecha_fin,
                'hora_fin' => $request->hora_fin,
                'todo_el_dia' => $request->todo_el_dia,
            ]);

            Alert::success('Éxito', 'El evento ha sido guardado exitosamente.');
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Alert::error('Error', 'Hubo un problema al guardar el evento.');
            return response()->json(['success' => false], 500);
        }
    }

    public function obtenerEventos()
    {
        $this->eliminarEventosPasados();

        $eventos = Evento::all();
        return response()->json($eventos);
    }

    private function eliminarEventosPasados()
    {
        $fechaActual = Carbon::now();

        Evento::whereRaw("TIMESTAMP(fecha_fin, hora_fin) < ?", [$fechaActual->subDay()])
            ->delete();
    }
}
