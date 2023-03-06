<?php

namespace App\Models;

use App\Traits\Relationships\HasOneSchool;
use App\Traits\Relationships\HasOneTeacher;
use App\Traits\Relationships\HasOneStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasOneSchool;
    use HasOneStudent;
    use HasOneTeacher;
    use HasFactory;

    protected $fillable = [
        'school_id',
        'street',
        'city',
        'country',
    ];
}
