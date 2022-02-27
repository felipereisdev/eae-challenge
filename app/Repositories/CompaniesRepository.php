<?php

namespace App\Repositories;

use App\Models\Company;

class CompaniesRepository implements ICompaniesRepository
{
    private Company $model;

    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    public function findById(int $id): Company
    {
        $company = $this->model->find($id);

        return $company;
    }

    public function findByName(string $name): Company
    {
        $company = $this->model->whereName($name)->first();

        return $company;
    }

    public function create(array $data): void
    {
        $this->model->firstOrCreate([
            'name' => $data['name'],
        ], $data);
    }
}
