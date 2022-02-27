<?php

namespace App\Http\Services;

use App\Http\Requests\CreateRoleRequest;
use App\Repositories\IRolesRepository;
use Exception;

class CreateRoleService
{
    private IRolesRepository $rolesRepository;

    public function __construct()
    {
        $this->rolesRepository = app(IRolesRepository::class);
    }

    public function execute(CreateRoleRequest $request): void
    {
        try {
            $this->rolesRepository->create($request->all());
        } catch (Exception $e) {
            info(__CLASS__." - {$e->getMessage()}", [$e->getTraceAsString()]);
        }
    }
}
