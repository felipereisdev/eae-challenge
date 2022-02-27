<?php

namespace App\Repositories;

use App\Models\Role;

class RolesRepository implements IRolesRepository
{
    private Role $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function findById(int $id): ?Role
    {
        $role = $this->model->find($id);

        return $role;
    }

    public function findByName(string $name): ?Role
    {
        $role = $this->model->whereName($name)->first();

        return $role;
    }

    public function create(array $data): void
    {
        $this->model->firstOrCreate([
            'name' => $data['name'],
        ], $data);
    }
}
