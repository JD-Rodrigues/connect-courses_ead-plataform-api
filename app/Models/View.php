<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'quant'
    ];
    public $incrementing = false;
    protected $keyType = 'uuid';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
}


