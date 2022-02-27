<?php

namespace App\Repositories;

use App\Models\Company;

interface ICompaniesRepository
{
    public function findById(int $id): ?Company;

    public function findByName(string $name): ?Company;

    public function create(array $data): void;
}
