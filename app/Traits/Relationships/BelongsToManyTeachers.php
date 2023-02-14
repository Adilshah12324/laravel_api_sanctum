<?php
namespace App\Traits\Relationships;

use App\Models\Teacher;

trait BelongsToManyTeachers{
    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
}
?>
