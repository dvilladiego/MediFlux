<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\AlertaController;

class ActualizarAlertas extends Command
{
    protected $signature = 'alertas:actualizar';
    protected $description = 'Actualiza las alertas de caducidad de medicamentos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $controller = new AlertaController();
        $controller->actualizarAlertas();
        $this->info('Alertas actualizadas correctamente.');
    }
}
