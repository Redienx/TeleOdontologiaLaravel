<?php

namespace App\Modules\HistoriaClinica\Application\Services;

use App\Modules\HistoriaClinica\Domain\Repositories\HistoriaClinicaRepositoryInterface;

class CrearHistoriaClinicaService
{
    public function __construct(private HistoriaClinicaRepositoryInterface $repo) {}

    public function ejecutar(array $data)
    {
        return $this->repo->crear($data);
    }
}