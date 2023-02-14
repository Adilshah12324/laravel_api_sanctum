<?php

namespace App\Traits\Relationships;

use App\Models\School;

trait HasOneSchool{

    public function school(){
        return $this->hasOne(School::class);
    }

}
?>
