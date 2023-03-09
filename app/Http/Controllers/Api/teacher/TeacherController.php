<?php

namespace App\Http\Controllers\Api\teacher;

use App\Http\Requests\updateTeacherRequest;
use Exception;
use App\Models\Address;
use App\Models\Teacher;
use Illuminate\Http\JsonResponse;
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
    public function index(): TeacherCollection
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
     * Store a newly created resource in storage.
     *
     * @param StoreTeacherRequest $request
     * @return JsonResponse
     */
    public function store(StoreTeacherRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try
            {
            $address = $request->only('street','city','country');
            $address = Address::create($address);
            $profileImagePath = null;

            if ($request->hasFile('profile_image')) {
                $profileImage = $request->file('profile_image');
                $filename = time() . '.' . $profileImage->getClientOriginalExtension();
                $profileImagePath = $profileImage->storeAs('profile/teachers/profile', $filename);
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
                'address' => $address->all(),
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
     * @param  Teacher $teacher
     * @return JsonResponse
     */
    public function show(Teacher $teacher): JsonResponse
    {
        $relationships = [];
            falseToNull(!request()->school)
            ?? array_push($relationships, 'school');
            falseToNull(!request()->teachers)
            ?? array_push($relationships, 'subjects');
            falseToNull(!request()->address)
            ?? array_push($relationships, 'address');

        $teacher = Teacher::with($relationships)->find($teacher->id);

        return response()->json([
            'status'      => $success ?? true,
            'type'        => 'teacher',
            'teacher' => $teacher ?? null
        ], $status ?? 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param updateTeacherRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(updateTeacherRequest $request, $id): JsonResponse
    {
        DB::beginTransaction();
        try
        {
            $addressUpdate = $request->only('street','city','country');
            $teacher = Teacher::findOrFail($id);
            $address = $teacher->address()->update($addressUpdate);
            $teacher->update([
                'name'          => $request->input('name'),
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
            'message'     => $message ?? 'Teacher is updated Successfully!',
            'type'        => 'teacher',
            'teacher' => $teacher ?? null
        ], $status ?? 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $teacher = Teacher::find($id);
        if (!$teacher){
            return response()->json([
                'teacher' => 'Teacher Not Found',
            ]);
        }
        $teacher->delete();

        return response()->json([
            'status'      => $success ?? true,
            'message'     => $message ?? 'Teacher deleted Successfully!',
            'type'        => 'teacher',
        ], $status ?? 201);
    }
}
