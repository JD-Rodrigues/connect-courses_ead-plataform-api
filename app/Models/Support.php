<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use App\Models\Lesson;
use App\Models\User;
use App\Models\SupportReply;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Support extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';


    protected $fillable = ['status_code', 'description', 'lesson_id'];

    public $statusOptions = [
        'T' => 'Under Review; Awaiting Teacher',
        'S' => 'Awaiting Student Closure or Follow-Up',
        'C' => 'Closed'
    ];

    protected function lesson(): BelongsTo {
        return $this->belongsTo(Lesson::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function supportReplies() {
        return $this->hasMany(SupportReply::class);
    }
}
