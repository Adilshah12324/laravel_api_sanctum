<?php

namespace App\Http\Controllers\Api\student;

use Exception;
use App\Models\Address;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentCollection;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return StudentCollection
     */
    public function index()
    {
        $relationships = [];
        falseToNull(!request()->teachers)
            ?? array_push($relationships, 'teachers');
        falseToNull(!request()->subjects)
            ?? array_push($relationships, 'subjects');
        falseToNull(!request()->school)
            ?? array_push($relationships, 'school');
        $students = Student::with('address')->get();
        
        return new StudentCollection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $address = $request->only('street','city','country');
            $address = Address::create($address);
            $student = Student::create([
                'school_id'  => $request->input('school_id'),
                'address_id' => $address->id,
                'name'       => $request->input('name'),
                'father_name'=> $request->input('father_name'),
                'dob'       => $request->input('dob'),
                'roll_no'    => $request->input('roll_no'),
                'fees'       => $request->input('fees'),
            ]);
            $student = [
                'student'=> $student,
                'address'=> $address,
            ];
            DB::commit();

        } catch (Exception $e) {
            $success = false;
            $message = 'Failed to create student (' . $e->getMessage() . ')!';
            $status  = 500;
        }
        return response()->json([
            'status'      => $success ?? true,
            'message'     => $message ?? 'Student created Successfully!',
            'type'        => 'student',
            'student' => $student ?? null
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        DB::beginTransaction();
        try
        {
            $addressUpdate = $request->only('street','city','country');
            $student = Student::findOrFail($id);
            $address = $student->address()->update($addressUpdate);
            $student->update([
                'name'       => $request->input('name'),
                'father_name'=> $request->input('father_name'),
                'dob'       => $request->input('dob'),
                'roll_no'    => $request->input('roll_no'),
                'fees'       => $request->input('fees'),
            ]);
            $student = [
                'student'=> $student,
                'address'=> $address,
            ];
            DB::commit();

        } catch (Exception $e) {
            $success = false;
            $message = 'Failed to update student (' . $e->getMessage() . ')!';
            $status  = 500;
        }
        return response()->json([
            'status'      => $success ?? true,
            'message'     => $message ?? 'Student Updated Successfully!',
            'type'        => 'student',
            'student' => $student ?? null
        ], $status ?? 201);       
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
