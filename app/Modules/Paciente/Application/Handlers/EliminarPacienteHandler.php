<?php

namespace App\Modules\Paciente\Application\Handlers;

use App\Modules\Paciente\Application\Commands\EliminarPacienteCommand;
use App\Modules\Paciente\Domain\Repositories\PacienteRepositoryInterface;
use App\Core\Domain\ValueObjects\Id;
use App\Modules\Paciente\Domain\Entities\Paciente;

class DeletePatientHandler
{
    public function __construct(
        private PacienteRepositoryInterface $repository
    ) {}

    public function __invoke(EliminarPacienteCommand $command): void
    {
        $paciente = $this->repository->findById(new Id($command->id));
        $paciente->deactivate();

        $this->repository->update($paciente);
    }
}
