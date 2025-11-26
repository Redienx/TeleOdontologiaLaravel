<?php

namespace app\Core\Domain\ValueObjects;

use DateTime;
use InvalidArgumentException;

class DateValue
{
    private DateTime $date;

    public function __construct(string $value)
    {
        $date = DateTime::createFromFormat('Y-m-d', $value);
        if (!$date) {
            throw new InvalidArgumentException("Formato de fecha inválido.");
        }
        $this->date = $date;
    }

    public function value(): ?string
    {
        return $this->date->format('Y-m-d');
    }
}
