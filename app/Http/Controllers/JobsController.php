<?php

namespace App\Http\Controllers;

use App\Repositories\IJobsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    private IJobsRepository $jobsRepository;

    public function __construct(IJobsRepository $jobsRepository)
    {
        $this->jobsRepository = $jobsRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $jobs = $this->jobsRepository->filter($request->get('filters'));

        return response()->json($jobs);
    }
}
