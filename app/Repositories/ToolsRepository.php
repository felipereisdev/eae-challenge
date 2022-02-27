<?php

namespace App\Repositories;

use App\Models\Tool;

class ToolsRepository implements IToolsRepository
{
    private Tool $model;

    public function __construct(Tool $tools)
    {
        $this->model = $tools;
    }

    public function findById(int $id): ?Tool
    {
        $tools = $this->model->find($id);

        return $tools;
    }

    public function findByName(string $name): ?Tool
    {
        $tools = $this->model->whereName($name)->first();

        return $tools;
    }

    public function create(array $data): void
    {
        $this->model->firstOrCreate([
            'name' => $data['name'],
        ], $data);
    }
}
