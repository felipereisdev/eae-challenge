<?php

namespace App\Http\Services;

use App\Http\Requests\CreateCompanyRequest;
use App\Repositories\ICompaniesRepository;
use Exception;

class CreateCompanyService
{
    private ICompaniesRepository $companiesRepository;

    public function __construct()
    {
        $this->companiesRepository = app(ICompaniesRepository::class);
    }

    public function execute(CreateCompanyRequest $request): void
    {
        try {
            $data = $request->all();
            $data['logo'] = ltrim($data['logo'], '.');

            $this->companiesRepository->create($data);
        } catch (Exception $e) {
            info(__CLASS__." - {$e->getMessage()}", [$e->getTraceAsString()]);
        }
    }
}
