<?php

namespace App\Repositories;

use App\Models\Role;

interface IRolesRepository
{
    public function findById(int $id): ?Role;

    public function findByName(string $name): ?Role;

    public function create(array $data): void;
}
