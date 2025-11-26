<?php

namespace App\Modules\Paciente\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Paciente\Application\Services\CrearPacienteService;
use App\Modules\Paciente\Http\Requests\CrearPacienteRequest;

class PacienteController extends Controller
{
    public function crear(CrearPacienteRequest $request, CrearPacienteService $service)
    {
        return $service->ejecutar($request->validated());
    }
}