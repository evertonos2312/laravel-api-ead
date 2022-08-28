<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\Module;
use App\Models\Submodule;
use App\Models\Support;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class SupportRepository
{
    protected $entity;

    public function __construct(Support $support)
    {
        $this->entity = $support;
    }

    private function getUserAuth() :User
    {
//        return auth()->user();
        return User::first();
    }

    public function getAllSupports(array $filters = [])
    {
        return $this->getUserAuth()->supports()
            ->where(function ($query) use ($filters){
                if(isset($filters['lesson'])){
                    $query->where('lesson_id', $filters['lesson']);
                }
                if(isset($filters['status'])){
                    $query->where('status', $filters['status']);
                }
                if(isset($filters['filter'])){
                    $filter = $filters['filter'];
                    $query->where('description', 'LIKE', "%{$filter}%");
                }
            })->get();
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
