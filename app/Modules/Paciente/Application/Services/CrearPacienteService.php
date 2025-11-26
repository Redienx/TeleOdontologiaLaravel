<?php

namespace App\Modules\Paciente\Application\Services;

use App\Modules\Paciente\Domain\Entities\Paciente;
use App\Modules\Paciente\Domain\Repositories\PacienteRepositoryInterface;

class CrearPacienteService
{
    public function __construct(private readonly PacienteRepositoryInterface $repository) {}

    function create(Paciente $paciente) : void
    {
        $this->repository->create($paciente);
        
    }

    

    public function ejecutar(array $data)
    {
        return $this->repository->create($data[]);
    }
}