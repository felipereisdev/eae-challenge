<?php

namespace App\Http\Services;

use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use App\Repositories\IJobsRepository;

class CreateJobService
{
    private IJobsRepository $jobsRepository;

    public function __construct()
    {
        $this->jobsRepository = app(IJobsRepository::class);
    }

    public function execute(CreateJobRequest $request): ?Job
    {
        return $this->jobsRepository->create($request->all());
    }
}
