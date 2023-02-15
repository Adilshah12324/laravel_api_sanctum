<?php

namespace App\Models;

use App\Traits\Relationships\BelongsToManyStudents;
use App\Traits\Relationships\BelongsToManyTeachers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use BelongsToManyTeachers;
    use BelongsToManyStudents;
    use HasFactory;
}
