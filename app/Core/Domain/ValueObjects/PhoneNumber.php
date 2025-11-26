<?php

namespace app\Core\Domain\ValueObjects;

use InvalidArgumentException;

class PhoneNumber
{
    public function __construct(private string $value)
    {
        if (strlen($value) < 6) {
            throw new InvalidArgumentException("Número telefónico inválido.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
