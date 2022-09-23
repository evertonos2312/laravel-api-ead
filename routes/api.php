<?php


use App\Http\Controllers\Api\Auth\{
    AuthController,
    ResetPasswordController};
use App\Http\Controllers\Api\{CourseController,
    LessonController,
    ModuleController,
    ReplySupportController,
    SubmoduleController,
    SupportController};
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLink'])->middleware('guest');

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/courses/{course}/lessons', LessonController::class);
    Route::post('/lesson/view', [LessonController::class, 'markLessonViewed']);
    Route::apiResource('/courses', CourseController::class);
    Route::apiResource('/modules/{module}/submodules', SubmoduleController::class);
    Route::apiResource('/modules', ModuleController::class);
    Route::get('/supports', [SupportController::class, 'index']);
    Route::post('/supports', [SupportController::class, 'store']);
    Route::get('/supports/user', [SupportController::class, 'userSupports']);
    Route::post('/replies', [ReplySupportController::class, 'createReply']);
});

Route::get('/', function () {
    return response()->json([
        'success' => false
    ]);
});
