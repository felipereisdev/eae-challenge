<?php

namespace App\Repositories;

use App\Models\Level;

class LevelsRepository implements ILevelsRepository
{
    private Level $model;

    public function __construct(Level $level)
    {
        $this->model = $level;
    }

    public function findById(int $id): ?Level
    {
        $level = $this->model->find($id);

        return $level;
    }

    public function findByName(string $name): ?Level
    {
        $level = $this->model->whereName($name)->first();

        return $level;
    }

    public function create(array $data): void
    {
        $this->model->firstOrCreate([
            'name' => $data['name'],
        ], $data);
    }
}
