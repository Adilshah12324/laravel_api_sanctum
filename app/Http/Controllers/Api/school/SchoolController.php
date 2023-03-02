<?php

namespace App\Http\Controllers\Api\school;

use App\Http\Controllers\Controller;
use App\Http\Resources\SchoolCollection;
use App\Models\School;

class SchoolController extends Controller
{
    public function index(){
        $relationships = [];
        falseToNull(!request()->students)
            ?? array_push($relationships);
        falseToNull(request()->teachers)
            ?? array_push($relationships);
        falseToNull(request()->addresses)
            ?? array_push($relationships);
        $schools = School::with($relationships)->get();
        
        return new SchoolCollection($schools);

    }
}
