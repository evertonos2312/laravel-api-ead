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

    public function createNewSupport(array $data)
    {
        return $this->getUserAuth()->supports()->create([
            'lesson_id' => $data['lesson'],
            'status' => $data['status'],
            'description' => $data['description'],
        ]);
    }


}
