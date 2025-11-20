<?php

namespace App\Modules\HistoriaClinica\Domain\Repositories;

interface HistoriaClinicaRepositoryInterface
{
    public function crear(array $data);
    public function obtenerPorId(string $id);
}