<?php

namespace App\Traits\Relationships;

use App\Models\Teacher;

trait HasOneTeacher{
    public function teacher(){
        return $this->hasOne(Teacher::class);
    }
}
?>
