<?php

use App\Http\Controllers\Api\{
    CursoController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/cursos', [CursoController::class, 'index']);

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
