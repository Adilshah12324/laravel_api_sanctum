<?php

namespace App\Traits\Relationships;

use App\Models\Student;

trait HasOneStudent{

    public function student(){
        return $this->hasOne(Student::class);
    }

}
?>
