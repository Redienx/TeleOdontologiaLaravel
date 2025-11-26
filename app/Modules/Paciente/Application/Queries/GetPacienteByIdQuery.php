<?php

namespace App\Modules\Paciente\Application\Queries;

class GetPacienteByIdQuery
{
    public function __construct(
        public readonly int $id
    ) {}
}
