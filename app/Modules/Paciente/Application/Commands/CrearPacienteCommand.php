<?php

namespace App\Modules\Paciente\Application\Commands;

class CrearPacienteCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $lastName,
        public readonly string $documentNumber,
        public readonly string $birthDate,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $address
    ) {}
}
