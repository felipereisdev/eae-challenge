<?php

namespace App\Repositories;

use App\Models\Tool;

interface IToolsRepository
{
    public function findById(int $id): ?Tool;

    public function findByName(string $name): ?Tool;

    public function create(array $data): void;
}
