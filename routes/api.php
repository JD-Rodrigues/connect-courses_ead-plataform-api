<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Resources\CourseResource;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;



Route::get('/', function() {
    return 'Aqui começa nossa API';
});

Route::get('/courses', [CourseController::class, 'index']);

Route::get('/courses/{id}', [CourseController::class, 'show']);
Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);