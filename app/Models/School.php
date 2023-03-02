<?php

namespace App\Models;

use App\Traits\Relationships\HasManyStudents;
use App\Traits\Relationships\HasManyAddresses;
use App\Traits\Relationships\HasManyTeachers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasManyAddresses;
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
