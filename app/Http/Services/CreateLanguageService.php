<?php

namespace App\Http\Services;

use App\Http\Requests\CreateLanguageRequest;
use App\Repositories\ILanguagesRepository;
use Exception;

class CreateLanguageService
{
    private ILanguagesRepository $languagesRepository;

    public function __construct()
    {
        $this->languagesRepository = app(ILanguagesRepository::class);
    }

    public function execute(CreateLanguageRequest $request): void
    {
        try {
            $this->languagesRepository->create($request->all());
        } catch (Exception $e) {
            info(__CLASS__." - {$e->getMessage()}", [$e->getTraceAsString()]);
        }
    }
}
