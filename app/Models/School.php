<?php

namespace App\Models;

use App\Traits\Relationships\HasManyStudents;
use App\Traits\Relationships\HasManyAddresses;
use App\Traits\Relationships\HasManyTeachers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasManyStudents;
    use HasManyTeachers;
    use HasManyAddresses;
    use HasFactory;
}
