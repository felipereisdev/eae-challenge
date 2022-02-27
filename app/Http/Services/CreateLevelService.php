<?php

namespace App\Http\Services;

use App\Http\Requests\CreateLevelRequest;
use App\Repositories\ILevelsRepository;
use Exception;

class CreateLevelService
{
    private ILevelsRepository $levelsRepository;

    public function __construct()
    {
        $this->levelsRepository = app(ILevelsRepository::class);
    }

    public function execute(CreateLevelRequest $request): void
    {
        try {
            $this->levelsRepository->create($request->all());
        } catch (Exception $e) {
            info(__CLASS__." - {$e->getMessage()}", [$e->getTraceAsString()]);
        }
    }
}
