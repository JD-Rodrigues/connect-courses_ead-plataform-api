<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    static function getAllModules($id) {
        try {
            return Module::where('course_id', $id)->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    static function getModule($id) {        
        try {
            
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}