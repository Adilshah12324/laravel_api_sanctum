<?php

namespace App\Models;

use App\Traits\Relationships\BelongsToManySubjects;
use App\Traits\Relationships\BelongsToSchool;
use App\Traits\Relationships\BelongsToManyStudents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use BelongsToManyStudents;
    use BelongsToManySubjects;
    use BelongsToSchool;
    use HasFactory;
}
