<?php

namespace App\Traits\Relationships;

use App\Models\School;

trait BelongsToSchool{

    public function school(){
        return $this->belongsTo(School::class);
    }

}
?>
