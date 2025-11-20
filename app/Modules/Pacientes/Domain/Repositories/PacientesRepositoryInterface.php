<?php

namespace App\Modules\Pacientes\Domain\Repositories;

interface PacientesRepositoryInterface
{
    public function crear(array $data);
    public function obtenerPorId(string $id);
}