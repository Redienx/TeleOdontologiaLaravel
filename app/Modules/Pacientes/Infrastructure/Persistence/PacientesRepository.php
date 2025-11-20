<?php

namespace App\Modules\Pacientes\Infrastructure\Persistence;

use App\Modules\Pacientes\Domain\Repositories\PacientesRepositoryInterface;

class PacientesRepository implements PacientesRepositoryInterface
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