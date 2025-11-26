<?php

namespace app\Core\Domain;

use app\Core\Domain\ValueObjects\Id;

abstract class BaseEntity
{
    protected readonly ?Id $id;
    protected readonly \DateTimeImmutable $createdAt;
    protected \DateTimeImmutable $updatedAt;

    public function __construct(
        ?Id $id = null,
        ?\DateTimeImmutable $createdAt  = null,
        ?\DateTimeImmutable $updatedAt  = null)
    {
        $this->id = $id;
        $this->createdAt = $createdAt ?? new \DateTimeImmutable();
        $this->updatedAt = $updatedAt ?? new \DateTimeImmutable();
    }

    public function id(): ?Id
    {
        return $this->id;
    }

    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function touch(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
}
