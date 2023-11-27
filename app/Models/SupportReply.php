<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SupportReply extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['support_id', 'user_id', 'description'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function support() {
        return $this->belongsTo(Support::class);
    }
    
}
