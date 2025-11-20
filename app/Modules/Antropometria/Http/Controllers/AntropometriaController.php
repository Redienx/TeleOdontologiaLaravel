<?php

namespace App\Modules\Antropometria\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Antropometria\Application\Services\CrearAntropometriaService;
use App\Modules\Antropometria\Http\Requests\CrearAntropometriaRequest;

class AntropometriaController extends Controller
{
    public function crear(CrearAntropometriaRequest $request, CrearAntropometriaService $service)
    {
        return $service->ejecutar($request->validated());
    }
}