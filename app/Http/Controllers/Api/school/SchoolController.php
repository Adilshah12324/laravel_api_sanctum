<?php

namespace App\Http\Controllers\Api\school;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\School;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;

class SchoolController extends Controller
{
    public function index(){
        $school = Teacher::with('subjects')->get();
        return response()->json([
            'tecaher' => $school,
        ]);
    }
}
