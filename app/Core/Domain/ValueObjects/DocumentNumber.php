<?php

namespace App\Core\Domain\ValueObjects;

class DocumentNumber
{
    public function __construct(private string $value)
    {
        if (strlen($value) < 5) {
            throw new \InvalidArgumentException("Número de documento inválido.");
        }
    }

    public function value(): ?string { return $this->value; }
}
