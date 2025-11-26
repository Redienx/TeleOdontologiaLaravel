<?php

namespace App\Modules\Paciente\Application\DTO;

class PacienteResponseDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $documentNumber,
        public string $birthDate,
        public string $email,
        public string $phone,
        public string $address,
        public bool $isActive,
        public string $createdAt,
        public string $updatedAt
    ) {}
}
