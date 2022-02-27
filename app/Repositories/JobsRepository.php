<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Collection;

class JobsRepository implements IJobsRepository
{
    private Job $model;

    public function __construct(Job $jobs)
    {
        $this->model = $jobs;
    }

    public function findAll(): Collection
    {
        $jobs = $this->model->allRelations()
            ->orderBy('title')
            ->get();

        return $jobs;
    }

    public function findById(int $id): ?Job
    {
        $job = $this->model->allRelations()
            ->find($id);

        return $job;
    }

    public function findByTitle(string $title): ?Job
    {
        $job = $this->model->allRelations()->whereTitle($title)
            ->first();

        return $job;
    }

    public function create(array $data): ?Job
    {
        /** @var Job */
        $job = $this->model->create($data);

        return $job->refresh();
    }

    public function addLanguages(Job $job, array $languageIds): void
    {
        $job->languages()->sync($languageIds);
    }

    public function addTools(Job $job, array $toolIds): void
    {
        $job->tools()->sync($toolIds);
    }
}
