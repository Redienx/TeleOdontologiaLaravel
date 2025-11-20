<?php

namespace App\Modules\Odontograma\Domain\Repositories;

interface OdontogramaRepositoryInterface
{
    public function crear(array $data);
    public function obtenerPorId(string $id);
}