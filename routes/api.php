<?php

use App\Http\Controllers\Api\{CourseController, LessonController, ModuleController, SubmoduleController};
use Illuminate\Support\Facades\Route;

Route::apiResource('/courses/{course}/lessons', LessonController::class);
Route::apiResource('/courses', CourseController::class);
Route::apiResource('/modules/{module}/submodules', SubmoduleController::class);
Route::apiResource('/modules', ModuleController::class);

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
