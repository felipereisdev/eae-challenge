<?php

namespace App\Repositories;

use App\Models\Level;

interface ILevelsRepository
{
    public function findById(int $id): ?Level;

    public function findByName(string $name): ?Level;

    public function create(array $data): void;
}
