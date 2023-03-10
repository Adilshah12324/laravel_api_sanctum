<?php

namespace App\Http\Controllers\Api\subject;

use Exception;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectCollection;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

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
    public function show(Subject $subject)
    {
        $relationships = [];
        falseToNull(!request()->students)
            ?? array_push($relationships, 'students');
        falseToNull(!request()->teachers)
            ?? array_push($relationships, 'teachers');
            falseToNull(!request()->school)
            ?? array_push($relationships, 'teachers.school');

        $subject = Subject::with($relationships)->findOrFail($subject->id);
        
        return response()->json([
            'status'      => $success ?? true,
            'type'        => 'subject',
            'subject'     => $subject ?? null
        ], $status ?? 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, $id)
    {
        try{
            $subject = $request->all();
            $subject = Subject::findOrFail($id)->update($subject);
            }catch (Exception $e) {
                $success = false;
                $message = 'Failed to update subject (' . $e->getMessage() . ')!';
                $status  = 500;
            }
            return response()->json([
                'status'      => $success ?? true,
                'message'     => $message ?? 'Subject Update Successfully!',
                'type'        => 'subject',
                'subject'     => $subject ?? null
            ], $status ?? 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject = Subject::findOrFail($subject->id);
        if(!$subject){
            return response()->json([
                'subject' => 'Subject Not Found',
            ]);
        }
        $subject->delete();

        return response()->json([
            'status'      => $success ?? true,
            'message'     => $message ?? 'Subject Deleted Successfully!',
            'type'        => 'subject',
        ], $status ?? 201);
    }
}
