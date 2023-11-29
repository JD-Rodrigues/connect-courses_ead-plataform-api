<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Resources\CourseResource;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SupportReplyController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function() {
    return 'Aqui começa nossa API';
});

Route::post('/login', [AuthController::class, 'authenticateUser']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);
    Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
    Route::get('/lessons/{id}', [LessonController::class, 'show']);
    Route::get('/supports', [SupportController::class, 'index']);
    Route::get('/my-supports', [SupportController::class, 'showMySupports']);
    Route::post('/supports', [SupportController::class, 'store']);
    Route::post('/support-replies', [SupportReplyController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logoutUser']);
}); 