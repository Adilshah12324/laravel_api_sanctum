<?php

namespace App\Http\Controllers\Api\teacher;

use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherCollection;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TeacherCollection
     */
    public function index()
    {
        $relationships = [];
        falseToNull(!request()->school)
            ?? array_push($relationships, 'school');
        falseToNull(!request()->teachers)
            ?? array_push($relationships, 'subjects');
        falseToNull(!request()->address)
            ?? array_push($relationships, 'address');

        $teachers = Teacher::with($relationships)->get();

        return new TeacherCollection($teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ' store teacher';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
