<?php

namespace App\Http\Services;

use App\Http\Requests\CreateToolRequest;
use App\Repositories\IToolsRepository;
use Exception;

class CreateToolService
{
    private IToolsRepository $toolsRepository;

    public function __construct()
    {
        $this->toolsRepository = app(IToolsRepository::class);
    }

    public function execute(CreateToolRequest $request): void
    {
        try {
            $this->toolsRepository->create($request->all());
        } catch (Exception $e) {
            info(__CLASS__." - {$e->getMessage()}", [$e->getTraceAsString()]);
        }
    }
}
