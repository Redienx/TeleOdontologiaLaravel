<?php

namespace App\Modules\Pacientes\Domain\Entities;

class Pacientes
{
    public function __construct(
        public string $id
    ) {}
}