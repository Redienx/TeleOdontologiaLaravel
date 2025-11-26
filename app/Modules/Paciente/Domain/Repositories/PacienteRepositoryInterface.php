<?php

namespace App\Modules\Paciente\Domain\Repositories;

use App\Core\Domain\ValueObjects\Id;
use App\Core\Domain\ValueObjects\DocumentNumber;
use App\Modules\Paciente\Domain\Entities\Paciente;

interface PacienteRepositoryInterface
{
    public function create(Paciente $paciente): Paciente;

    public function update(Paciente $paciente): Paciente;

    public function findById(Id $id): ?Paciente;

    public function findAll(): array;

    public function delete(Id $id): void;

    public function findByDocument(DocumentNumber $document): ?Paciente;
}
