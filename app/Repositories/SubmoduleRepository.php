<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\Module;
use App\Models\Submodule;
use Illuminate\Support\Facades\Cache;

class SubmoduleRepository
{
    protected $entity;

    public function __construct(Submodule $submodule)
    {
        $this->entity = $submodule;
    }

    public function getSubmodulesModule(int $moduleId)
    {
        return $this->entity
            ->where('module_id', $moduleId)
            ->get();
    }

    public function createNewSubmodule(int $moduleId, array $data)
    {
        $data['module_id'] = $moduleId;
        Cache::forget('courses');
        return $this->entity->create($data);
    }

    public function getSubmoduleByModule(int $moduleId, string $identify)
    {
        return $this->entity
            ->where('module_id', $moduleId)
            ->where('uuid', $identify)
            ->firstOrfail();
    }

    public function getSubmoduleByUuid(string $identify)
    {
        return $this->entity
            ->where('uuid', $identify)
            ->firstOrfail();
    }

    public function updateSubmoduleByUuid(int $moduleId, string $identify, array $data)
    {
        $submodule = $this->getSubmoduleByUuid($identify);
        $data['module_id'] = $moduleId;
        Cache::forget('courses');
        return $submodule->update($data);
    }

    public function deleteSubmoduleByUuid(string $identify)
    {
        $submodule = $this->getSubmoduleByUuid($identify);
        Cache::forget('courses');
        return $submodule->delete();
    }
}
