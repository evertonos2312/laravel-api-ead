<?php

namespace App\Services;

use App\Repositories\SupportRepository;

class SupportService
{
    protected $supportRepository;

    public function __construct(
        SupportRepository $supportRepository
    ) {
        $this->supportRepository = $supportRepository;
    }

    public function getSupports(array $filters = [])
    {
        return $this->supportRepository->getAllSupports($filters);
    }

    public function createNewSubmodule(array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);
        return $this->submoduleRepository->createNewSubmodule($module->id, $data);
    }

    public function getSubmoduleByModule(string $module, string $identify)
    {
        $module = $this->moduleRepository->getModuleByUuid($module);
        return $this->submoduleRepository->getSubmoduleByModule($module->id, $identify);
    }

    public function updateSubmodule(string $identify, array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);
        return $this->submoduleRepository->updateSubmoduleByUuid($module->id, $identify, $data);
    }

    public function deleteSubmodule(string $identify)
    {
        return $this->submoduleRepository->deleteSubmoduleByUuid($identify);
    }
}
