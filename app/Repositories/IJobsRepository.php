<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Collection;

interface IJobsRepository
{
    public function findAll(): Collection;

    public function findById(int $id): ?Job;

    public function findByTitle(string $title): ?Job;

    public function create(array $data): ?Job;

    public function addLanguages(Job $job, array $languageIds): void;

    public function addTools(Job $job, array $toolIds): void;
}
