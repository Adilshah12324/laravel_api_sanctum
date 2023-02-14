<?php

namespace App\Traits\Relationships;

use App\Models\Student;

trait HasManyStudents{
    public function students(){
        return $this->hasMany(Student::class);
    }
}
?>
