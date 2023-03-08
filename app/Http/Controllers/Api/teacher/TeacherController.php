<?php

namespace App\Http\Controllers\Api\teacher;

use Exception;
use App\Models\Address;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherCollection;
use App\Http\Requests\StoreTeacherRequest;

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
    public function store(StoreTeacherRequest $request)
    {   
        DB::beginTransaction();
        try
            {     
            $address = $request->only('street','city','country');
            $address = Address::create($address);
            $profileImagePath = null;

            if ($request->hasFile('profile_image')) {
                $profileImage = $request->file('profile_image');
                $profileImagePath = $profileImage->store('teachers/profile', 'public');
            }
            $teacher = Teacher::create([
                'school_id'     => $request->input('school_id'),
                'address_id'    => $address->id,
                'name'          => $request->input('name'),
                'profile_image' => $profileImagePath,
                'phone'         => $request->input('phone'),
                'email'         => $request->input('email'),
                'age'           => $request->input('age'),
                'qualification' => $request->input('qualification'),
                'specialization'=> $request->input('specialization'),
                'experience'    => $request->input('experience'),
            ]);
            $teacher = [
                'teacher' => $teacher,
                'address' => $address
            ];
            DB::commit();
            
            } catch (Exception $e) {
                $success = false;
                $message = 'Failed to create teacher (' . $e->getMessage() . ')!';
                $status  = 500;
        }

        return response()->json([
            'status'      => $success ?? true,
            'message'     => $message ?? 'Teacher is created Successfully!',
            'type'        => 'teacher',
            'teacher' => $teacher ?? null
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
