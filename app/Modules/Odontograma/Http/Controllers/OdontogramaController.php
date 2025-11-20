<?php

namespace App\Modules\Odontograma\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Odontograma\Application\Services\CrearOdontogramaService;
use App\Modules\Odontograma\Http\Requests\CrearOdontogramaRequest;

class OdontogramaController extends Controller
{
    public function crear(CrearOdontogramaRequest $request, CrearOdontogramaService $service)
    {
        return $service->ejecutar($request->validated());
    }
}