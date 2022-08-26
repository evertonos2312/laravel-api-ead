<?php

use App\Http\Controllers\Api\{CourseController, ModuleController, SubmoduleController};
use Illuminate\Support\Facades\Route;

Route::apiResource('/courses', CourseController::class);
Route::apiResource('/modules/{module}/submodules', SubmoduleController::class);
Route::apiResource('/modules', ModuleController::class);

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
