<?php

namespace App\Modules\Paciente\Infrastructure\Persistence;

use App\Modules\Paciente\Domain\Repositories\PacienteRepositoryInterface;

class PacienteRepository implements PacienteRepositoryInterface
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