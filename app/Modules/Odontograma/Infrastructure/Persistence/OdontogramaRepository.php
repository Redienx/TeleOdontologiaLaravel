<?php

namespace App\Modules\Odontograma\Infrastructure\Persistence;

use App\Modules\Odontograma\Domain\Repositories\OdontogramaRepositoryInterface;

class OdontogramaRepository implements OdontogramaRepositoryInterface
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