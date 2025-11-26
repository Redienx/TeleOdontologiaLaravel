<?php

namespace app\Core\Domain;

abstract class AggregateRoot extends BaseEntity
{
    private array $events = [];

    protected function recordEvent(object $event): void
    {
        $this->events[] = $event;
    }

    public function pullEvents(): array
    {
        $events = $this->events;
        $this->events = [];
        return $events;
    }
}
