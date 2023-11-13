<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Resources\CourseResource;
use App\Http\Controllers\CourseController;



Route::get('/', function() {
    return 'Aqui começa nossa API';
});

Route::get('/courses', function() {
    return CourseResource::collection(CourseController::index());
});