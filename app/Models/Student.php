<?php

namespace App\Models;

use App\Traits\Relationships\BelongsToAddress;
use App\Traits\Relationships\BelongsToManySubjects;
use App\Traits\Relationships\BelongsToManyTeachers;
use App\Traits\Relationships\BelongsToSchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use belongsToSchool;
    use BelongsToAddress;
    use belongsToManyTeachers;
    use belongsToManySubjects;
    use HasFactory;
}
