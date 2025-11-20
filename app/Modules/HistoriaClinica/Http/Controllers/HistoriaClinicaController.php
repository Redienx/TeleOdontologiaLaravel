<?php

namespace App\Modules\HistoriaClinica\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\HistoriaClinica\Application\Services\CrearHistoriaClinicaService;
use App\Modules\HistoriaClinica\Http\Requests\CrearHistoriaClinicaRequest;

class HistoriaClinicaController extends Controller
{
    public function crear(CrearHistoriaClinicaRequest $request, CrearHistoriaClinicaService $service)
    {
        return $service->ejecutar($request->validated());
    }
}