<?php

namespace App\Http\Controllers\Api\subject;

use Exception;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectCollection;
use App\Http\Requests\StoreSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SubjectCollection
     */
    public function index()
    {
        $relationships = [];
        falseToNull(!request()->students)
            ?? array_push($relationships, 'students');
        falseToNull(!request()->teachers)
            ?? array_push($relationships, 'teachers');
            falseToNull(!request()->school)
            ?? array_push($relationships, 'teachers.school');

        $subjects = Subject::with($relationships)->get();

        return new SubjectCollection($subjects);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        try{
        $subject = $request->all();
        $subject = Subject::create($subject);
        }catch (Exception $e) {
            $success = false;
            $message = 'Failed to create subject (' . $e->getMessage() . ')!';
            $status  = 500;
        }
        return response()->json([
            'status'      => $success ?? true,
            'message'     => $message ?? 'Subject Created Successfully!',
            'type'        => 'subject',
            'subject'     => $subject ?? null
        ], $status ?? 201);
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
