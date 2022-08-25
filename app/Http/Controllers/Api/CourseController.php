<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $courses = $this->courseService->getCourses();
        return CourseResource::collection($courses);
    }

    /**
     * Display the specified resource.
     *
     * @param string $identify
     * @return CourseResource
     */
    public function show(string $identify): CourseResource
    {
        $course = $this->courseService->getCourse($identify);
        return new CourseResource($course);
    }
}
