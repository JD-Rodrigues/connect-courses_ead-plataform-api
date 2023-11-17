<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use App\Models\Module;

class Lesson extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;    
    protected $keyType = 'uuid';

    protected $fillable = ['id', 'module_id', 'name', 'description', 'video', 'url'];

    public function module() {
        $this->belongsTo(Module::class);
    }
}
