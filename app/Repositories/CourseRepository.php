<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Http\Response;


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
        try {
            return Course::findOrFail($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}