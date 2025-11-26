<?php

namespace App\Modules\Paciente\Application\Handlers;

use App\Modules\Paciente\Application\Commands\ActualizarPacienteCommand;
use App\Modules\Paciente\Application\DTO\PacienteResponseDTO;
use App\Modules\Paciente\Domain\Repositories\PacienteRepositoryInterface;
use App\Core\Domain\ValueObjects\FullName;
use App\Core\Domain\ValueObjects\DocumentNumber;
use App\Core\Domain\ValueObjects\Email;
use App\Core\Domain\ValueObjects\PhoneNumber;
use App\Core\Domain\ValueObjects\DateValue;
use App\Core\Domain\ValueObjects\Id;
use app\Core\Domain\ValueObjects\StringValue;
use App\Modules\Paciente\Domain\Entities\Paciente;

class ActualizarPacienteHandler
{
    public function __construct(
        private PacienteRepositoryInterface $repository
    ) {}

    public function __invoke(ActualizarPacienteCommand $command): PacienteResponseDTO
    {
        $paciente = $this->repository->findById(new Id($command->id));

        $paciente->update(
            name: new FullName($command->name, $command->lastName),
            documentNumber: new DocumentNumber($command->documentNumber),
            birthDate: new DateValue($command->birthDate),
            email: new Email($command->email),
            phone: new PhoneNumber($command->phone),
            address: new StringValue($command->address)
        );

        $this->repository->update($paciente);

        return new PacienteResponseDTO(
            id: $paciente->id()->value(),
            name: $paciente->name()->value(),
            documentNumber: $paciente->documentNumber()->value(),
            birthDate: $paciente->birthDate()->value(),
            email: $paciente->email()->value(),
            phone: $paciente->phone()->value(),
            address: $paciente->address(),
            isActive: $paciente->isActive(),
            createdAt: $paciente->createdAt()->format('Y-m-d H:i:s'),
            updatedAt: $paciente->updatedAt()->format('Y-m-d H:i:s')
        );
    }
}
