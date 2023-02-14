<?php

namespace App\Traits\Relationships;

use App\Models\Teacher;

trait HasManyTeachers{
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
}
?>
