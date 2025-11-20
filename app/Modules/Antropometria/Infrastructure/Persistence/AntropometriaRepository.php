<?php

namespace App\Modules\Antropometria\Infrastructure\Persistence;

use App\Modules\Antropometria\Domain\Repositories\AntropometriaRepositoryInterface;

class AntropometriaRepository implements AntropometriaRepositoryInterface
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