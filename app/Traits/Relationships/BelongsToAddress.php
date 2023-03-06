<?php
namespace App\Traits\Relationships;

use App\Models\Address;

trait BelongsToAddress{
    public function address(){
        return $this->belongsTo(Address::class);
    }
}
?>
