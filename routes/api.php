<?php

use App\Http\Controllers\Api\{
    CourseController,
    LessonController,
    ModuleController,
    ReplySupportController,
    SubmoduleController,
    SupportController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('/courses/{course}/lessons', LessonController::class);
Route::apiResource('/courses', CourseController::class);
Route::apiResource('/modules/{module}/submodules', SubmoduleController::class);
Route::apiResource('/modules', ModuleController::class);
Route::apiResource('/supports', SupportController::class);
Route::post('/supports/{support}/replies', [ReplySupportController::class, 'createReply']);

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
