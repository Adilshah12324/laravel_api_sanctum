<?php
namespace App\Traits\Relationships;

use App\Models\Address;

trait HasManyAddresses{
    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
?>
