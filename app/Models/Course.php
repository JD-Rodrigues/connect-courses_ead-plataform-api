<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

class Course extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;

    protected $keyType = 'uuid';
    protected $fillable = ['id', 'name', 'description', 'image']; 

    public function modules() {
        $this->hasMany(Module::class);
    }
}
