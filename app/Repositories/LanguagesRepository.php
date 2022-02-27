<?php

namespace App\Repositories;

use App\Models\Language;

class LanguagesRepository implements ILanguagesRepository
{
    private Language $model;

    public function __construct(Language $languages)
    {
        $this->model = $languages;
    }

    public function findById(int $id): ?Language
    {
        $languages = $this->model->find($id);

        return $languages;
    }

    public function findByName(string $name): ?Language
    {
        $languages = $this->model->whereName($name)->first();

        return $languages;
    }

    public function create(array $data): void
    {
        $this->model->firstOrCreate([
            'name' => $data['name'],
        ], $data);
    }
}
