<?php

namespace app\Core\Domain\ValueObjects;

class StringValue
{
    public function __construct(private string $value) {
        if (trim($value) === '') {
            throw new \InvalidArgumentException("El valor no puede estar vacío.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
