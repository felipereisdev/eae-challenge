<?php

namespace App\Http\Controllers\Filters;

use App\Http\Controllers\Controller;
use App\Repositories\IJobsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FilterJobsController extends Controller
{
    private IJobsRepository $jobsRepository;

    public function __construct(IJobsRepository $jobsRepository)
    {
        $this->jobsRepository = $jobsRepository;
    }

    public function filter(Request $request): JsonResponse
    {
        $jobs = $this->jobsRepository->filter($request->get('filters'));

        return response()->json($jobs);
    }
}
