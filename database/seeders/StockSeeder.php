<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;
use App\Models\Medicamento;

class StockSeeder extends Seeder
{
    public function run()
    {
        // Asegúrate de que ya tengas medicamentos en la base de datos
        $medicamento = Medicamento::first(); // Esto recupera el primer medicamento

        if ($medicamento) {
            Stock::create([
                'ID_Medicamento' => $medicamento->ID_Medicamento,
                'Cantidad_Disponible' => 100,
                'Cantidad_Minima_Requerida' => 20,
            ]);
        } else {
            // Si no hay medicamentos, también podrías crear uno para evitar errores
            $medicamento = Medicamento::create([
                'Nombre_Medicamento' => 'Paracetamol',
                'Codigo_Medicamento' => 'PARA123',
                // Otros campos según tu estructura
            ]);

            Stock::create([
                'ID_Medicamento' => $medicamento->ID_Medicamento,
                'Cantidad_Disponible' => 100,
                'Cantidad_Minima_Requerida' => 20,
            ]);
        }
    }
}
