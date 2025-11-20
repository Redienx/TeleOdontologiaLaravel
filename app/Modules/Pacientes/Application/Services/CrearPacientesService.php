<?php

namespace App\Modules\Pacientes\Application\Services;

use App\Modules\Pacientes\Domain\Repositories\PacientesRepositoryInterface;

class CrearPacientesService
{
    public function __construct(private PacientesRepositoryInterface $repo) {}

    public function ejecutar(array $data)
    {
        return $this->repo->crear($data);
    }
}