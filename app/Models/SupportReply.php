<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SupportReply extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['support_id', 'user_id', 'description'];
    
}
