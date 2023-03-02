<?php

namespace App\Models;

use App\Traits\Relationships\BelongsToSchool;
use App\Traits\Relationships\BelongsToManyStudents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use BelongsToSchool;
    use HasFactory;

    protected $fillable = [
        'school_id',
        'street',
        'city',
        'country',
    ];
}
