<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use App\Models\Lesson;
use App\Models\User;

class Support extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';


    protected $fillable = ['status', 'description'];

    public $statusOptions = [
        'T' => 'Under Review; Awaiting Teacher',
        'S' => 'Awaiting Student Closure or Follow-Up',
        'C' => 'Closed'
    ];

    protected function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    protected function user() {
        return $this->belongsTo(User::class);
    }
}
