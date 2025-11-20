<?php

namespace App\Modules\Pacientes\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Pacientes\Application\Services\CrearPacientesService;
use App\Modules\Pacientes\Http\Requests\CrearPacientesRequest;

class PacientesController extends Controller
{
    public function crear(CrearPacientesRequest $request, CrearPacientesService $service)
    {
        return $service->ejecutar($request->validated());
    }
}