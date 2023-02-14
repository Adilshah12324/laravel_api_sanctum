<?php
namespace App\Traits\Relationships;

use App\Models\Student;

trait BelongsToManyStudents{
    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
?>
