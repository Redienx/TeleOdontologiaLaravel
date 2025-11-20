<?php

namespace App\Modules\Antropometria\Domain\Repositories;

interface AntropometriaRepositoryInterface
{
    public function crear(array $data);
    public function obtenerPorId(string $id);
}