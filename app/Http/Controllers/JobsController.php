<?php

namespace App\Http\Controllers;

use App\Repositories\IJobsRepository;
use Illuminate\Database\Eloquent\Collection;

class JobsController extends Controller
{
    private IJobsRepository $jobsRepository;

    public function __construct(IJobsRepository $jobsRepository)
    {
        $this->jobsRepository = $jobsRepository;
    }

    public function index(): Collection
    {
        $jobs = $this->jobsRepository->findAll();

        return $jobs;
    }
}
