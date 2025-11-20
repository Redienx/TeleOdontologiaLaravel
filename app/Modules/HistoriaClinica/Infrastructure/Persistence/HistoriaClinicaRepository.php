<?php

namespace App\Modules\HistoriaClinica\Infrastructure\Persistence;

use App\Modules\HistoriaClinica\Domain\Repositories\HistoriaClinicaRepositoryInterface;

class HistoriaClinicaRepository implements HistoriaClinicaRepositoryInterface
{
    public function crear(array $data)
    {
        // Implementar persistencia
    }

    public function obtenerPorId(string $id)
    {
        // Implementar consulta
    }
}