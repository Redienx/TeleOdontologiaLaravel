<?php

namespace App\Modules\Odontograma\Application\Services;

use App\Modules\Odontograma\Domain\Repositories\OdontogramaRepositoryInterface;

class CrearOdontogramaService
{
    public function __construct(private OdontogramaRepositoryInterface $repo) {}

    public function ejecutar(array $data)
    {
        return $this->repo->crear($data);
    }
}