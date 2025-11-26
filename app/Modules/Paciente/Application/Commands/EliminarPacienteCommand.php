<?php

namespace App\Modules\Paciente\Application\Commands;

class EliminarPacienteCommand
{
    public function __construct(
        public readonly int $id
    ) {}
}
