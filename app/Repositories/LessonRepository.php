<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{
    static function getAllLessons($id) {
        try {
            return Lesson::where('module_id', $id)->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    static function getLesson($id) {        
        try {
            return Lesson::findOrFail($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}