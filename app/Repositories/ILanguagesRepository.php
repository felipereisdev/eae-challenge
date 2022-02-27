<?php

namespace App\Repositories;

use App\Models\Language;

interface ILanguagesRepository
{
    public function findById(int $id): ?Language;

    public function findByName(string $name): ?Language;

    public function create(array $data): void;
}
