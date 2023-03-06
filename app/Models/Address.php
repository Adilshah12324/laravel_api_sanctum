<?php

namespace App\Models;

use App\Traits\Relationships\HasOneSchool;
use App\Traits\Relationships\HasOneTeacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasOneSchool;
    use HasOneTeacher;
    use HasFactory;

    protected $fillable = [
        'school_id',
        'street',
        'city',
        'country',
    ];
}
