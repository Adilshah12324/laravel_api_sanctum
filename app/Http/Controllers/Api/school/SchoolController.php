<?php

namespace App\Http\Controllers\Api\school;

use App\Http\Controllers\Controller;
use App\Http\Resources\SchoolCollection;
use App\Models\Address;
use App\Models\School;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;

class SchoolController extends Controller
{
    public function index(){
        $schools = School::all();
        return new SchoolCollection($schools);

    }
}
