<?php

namespace app\Core\Domain\ValueObjects;

class Id
{

    public function __construct(private int $value) {
        if ($value <= 0) {
            throw new \InvalidArgumentException("El ID debe ser un entero positivo.");
        }
    }

    public function value(): int
    {
        return $this->value;
    }

    public function __toString()
    {
        return (string)$this->value;
    }
}