<?php

namespace App\Core\Domain\ValueObjects;

class FullName
{
    public function __construct(
        private string $name,
        private string $lastName
    ) {
        if (empty($firstName) || empty($lastName)) {
            throw new \InvalidArgumentException("Nombre y apellido son requeridos.");
        }
    }

    public function Name(): string { return $this->name; }
    public function lastName(): string { return $this->lastName; }

    public function value(): string
    {
        return "{$this->name} {$this->lastName}";
    }

    public function __toString(): string
    {
        return $this->name . ' ' . $this->lastName;
    }
}
