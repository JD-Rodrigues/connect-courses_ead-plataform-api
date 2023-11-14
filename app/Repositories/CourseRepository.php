<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    static function getAllCourses() {
        try {
            return Course::all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    static function getCourse( $id) {
        return Course::findOrFail($id);
    }
}