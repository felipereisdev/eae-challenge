<?php

namespace Database\Seeders;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\CreateLanguageRequest;
use App\Http\Requests\CreateLevelRequest;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\CreateToolRequest;
use App\Http\Services\CreateCompanyService;
use App\Http\Services\CreateJobService;
use App\Http\Services\CreateLanguageService;
use App\Http\Services\CreateLevelService;
use App\Http\Services\CreateRoleService;
use App\Http\Services\CreateToolService;
use App\Models\Job;
use App\Repositories\ICompaniesRepository;
use App\Repositories\IJobsRepository;
use App\Repositories\ILanguagesRepository;
use App\Repositories\ILevelsRepository;
use App\Repositories\IRolesRepository;
use App\Repositories\IToolsRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ImportJsonDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DS = DIRECTORY_SEPARATOR;
        $filePath = storage_path()."{$DS}json{$DS}data.json";

        if (file_exists($filePath)) {
            $jsonData = collect(json_decode(file_get_contents($filePath)));

            $this->importData($jsonData);
        }
    }

    private function importData(Collection $collection): void
    {
        if ($collection->count()) {
            $collection->each(function (object $data) {
                $this->createCompany($data);
                $this->createLevel($data);
                $this->createRole($data);
                $this->createLanguage($data);
                $this->createTool($data);
                $this->createJob($data);
            });
        }
    }

    private function createCompany(object $data): void
    {
        $request = new CreateCompanyRequest([
            'name' => trim(Str::title($data->company)),
            'logo' => trim($data->logo),
        ]);

        $createCompanyService = new CreateCompanyService();
        $createCompanyService->execute($request);
    }

    private function createLevel(object $data): void
    {
        $request = new CreateLevelRequest([
            'name' => trim(Str::ucfirst($data->level)),
        ]);

        $createLevelService = new CreateLevelService();
        $createLevelService->execute($request);
    }

    private function createRole(object $data): void
    {
        $request = new CreateRoleRequest([
            'name' => trim(Str::ucfirst($data->role)),
        ]);

        $createRoleService = new CreateRoleService();
        $createRoleService->execute($request);
    }

    private function createLanguage(object $data): void
    {
        collect($data->languages)->each(function (string $language) {
            $request = new CreateLanguageRequest([
                'name' => trim(Str::ucfirst($language)),
            ]);

            $createLanguageService = new CreateLanguageService();
            $createLanguageService->execute($request);
        });
    }

    private function createTool(object $data): void
    {
        collect($data->tools)->each(function (string $tool) {
            $request = new CreateToolRequest([
                'name' => trim(Str::ucfirst($tool)),
            ]);

            $createToolService = new CreateToolService();
            $createToolService->execute($request);
        });
    }

    private function createJob(object $data): void
    {
        /** @var ICompaniesRepository */
        $companiesRepositoy = app(ICompaniesRepository::class);
        $company = $companiesRepositoy->findByName($data->company);

        /** @var IRolesRepository */
        $rolesRepositoy = app(IRolesRepository::class);
        $role = $rolesRepositoy->findByName($data->role);

        /** @var ILevelsRepository */
        $levelsRepositoy = app(ILevelsRepository::class);
        $level = $levelsRepositoy->findByName($data->level);

        $request = new CreateJobRequest([
            'title' => trim(Str::ucfirst($data->position)),
            'location' => trim(Str::title($data->location)),
            'created_at' => trim($data->postedAt),
            'contract' => trim($data->contract),
            'new' => (bool) $data->new,
            'featured' => (bool) $data->featured,
            'role_id' => $role->id,
            'level_id' => $level->id,
            'company_id' => $company->id,
        ]);

        $createJobService = new CreateJobService();
        $job = $createJobService->execute($request);

        $this->addLanguagesToJobs($job, $data->languages);
        $this->addToolsToJobs($job, $data->tools);
    }

    public function addLanguagesToJobs(Job $job, array $languageNames): void
    {
        $languageIds = collect($languageNames)->map(function (string $language) {
            /** @var ILanguagesRepository */
            $languagesRepository = app(ILanguagesRepository::class);
            $language = $languagesRepository->findByName($language);

            return $language->id;
        })->toArray();

        /** @var IJobsRepository */
        $jobsRepository = app(IJobsRepository::class);
        $jobsRepository->addLanguages($job, $languageIds);
    }

    public function addToolsToJobs(Job $job, array $toolNames): void
    {
        $toolIds = collect($toolNames)->map(function (string $tool) {
            /** @var IToolsRepository */
            $toolsRepository = app(IToolsRepository::class);
            $tool = $toolsRepository->findByName($tool);

            return $tool->id;
        })->toArray();

        /** @var IJobsRepository */
        $jobsRepository = app(IJobsRepository::class);
        $jobsRepository->addTools($job, $toolIds);
    }
}
