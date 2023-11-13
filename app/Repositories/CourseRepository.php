<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    static function getAllCourses() {
        return Course::all();
    }
}