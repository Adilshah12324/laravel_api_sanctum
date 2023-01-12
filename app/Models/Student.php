<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city',
        'fees'
    ];
}
