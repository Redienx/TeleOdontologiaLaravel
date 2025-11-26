<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\BaseEntity;
use App\Core\Domain\ValueObjects\Id;

interface RepositoryInterface
{
    public function create(BaseEntity $entity): BaseEntity;

    public function update(BaseEntity $entity): BaseEntity;

    public function finById(Id $id): ?BaseEntity;

    public function findAll(): array;

    public function delete(Id $id): void;
}
