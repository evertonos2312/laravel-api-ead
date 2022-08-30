<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\Module;
use App\Models\Submodule;
use App\Models\Support;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class ReplySupportRepository
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

    public function createReplyBySupportId(string $supportId, array $data)
    {
        $user = $this->getUserAuth();
        return $this->getSupport($supportId)->replies()->create([
          'description' => $data['description'],
          'user_id' => $user->id
       ]);
    }

    private function getSupport(string $id)
    {
        return Support::findOrFail($id);
    }


}
