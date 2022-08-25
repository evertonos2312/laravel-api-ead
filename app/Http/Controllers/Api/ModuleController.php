<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModule;
use App\Http\Resources\ModuleResource;
use App\Services\ModuleService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ModuleController extends Controller
{
    protected $moduleService;

    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $courses = $this->moduleService->getModules();
        return ModuleResource::collection($courses);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUpdateModule $request
     * @return ModuleResource
     */
    public function store(StoreUpdateModule $request): ModuleResource
    {
        $module = $this->moduleService->createNewModule($request->validated());
        return new ModuleResource($module);
    }
}
