<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\Cache;

class CourseRepository
{
    protected $entity;

    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
            return $this->entity->get();
//        return Cache::remember('courses', 900, function () {
//        });
    }

    public function createNewCourse(array $data)
    {
        return $this->entity->create($data);
    }

    public function getCourseByUuid(string $identify, bool $loadRelationships = false)
    {
        $query =  $this->entity->where('uuid', $identify);
        if($loadRelationships) {
            $query->with('modules.lessons');
        }
        return $query->firstOrFail();
    }

    public function deleteCourseByUuid(string $identify)
    {
        $course =  $this->getCourseByUuid($identify, false);
        Cache::forget('courses');
        return $course->delete();
    }

    public function updateCourseByUuid(string $identify, array $data)
    {
        $course =  $this->getCourseByUuid($identify, false);
        Cache::forget('courses');
        return $course->update($data);
    }
}
