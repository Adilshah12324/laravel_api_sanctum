<?php
namespace App\Traits\Relationships;

use App\Models\Student;
use App\Models\Subject;

trait BelongsToManySubjects{
    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }
}
?>
