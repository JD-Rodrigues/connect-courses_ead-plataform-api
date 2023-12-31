<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use App\Models\Course;
use App\Models\Lesson;

class Module extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyTypes = 'uuid';
    protected $fillable = ['id', 'course_id', 'name'];

    public function course() {
        $this->belongsTo(Course::class);
    }

    public function lessons() {
        $this->hasMany(Lesson::class);
    }
}
