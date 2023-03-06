<?php

namespace App\Models;

use App\Traits\Relationships\HasManyStudents;
use App\Traits\Relationships\BelongsToAddress;
use App\Traits\Relationships\HasManyTeachers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use BelongsToAddress;
    use HasManyStudents;
    use HasManyTeachers;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'website',
        'strength',
        'phone'
    ];
}
