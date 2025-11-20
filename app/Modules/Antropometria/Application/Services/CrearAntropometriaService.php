<?php

namespace App\Modules\Antropometria\Application\Services;

use App\Modules\Antropometria\Domain\Repositories\AntropometriaRepositoryInterface;

class CrearAntropometriaService
{
    public function __construct(private AntropometriaRepositoryInterface $repo) {}

    public function ejecutar(array $data)
    {
        return $this->repo->crear($data);
    }
}