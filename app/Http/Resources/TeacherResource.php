<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $address_id
 * @property mixed $school_id
 * @property mixed $name
 * @property mixed $phone
 * @property mixed $email
 * @property mixed $age
 * @property mixed $specialization
 * @property mixed $experience
 * @property mixed $school
 * @property mixed $students
 * @property mixed $subjects
 */
class TeacherResource extends JsonResource
{
    public static $wrap = 'teachers';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'address_id'    => $this->address_id,
            'school_id'     => $this->school_id,
            'name'          => $this->name,
            'phone'         => $this->phone,
            'email'         => $this->email,
            'age'           => $this->age,
            'qualification' => $this->specialization,
            'experience'    => $this->experience,
            'school'        => $this->when(request()->school, $this->school),
            'students'      => $this->when(request()->students, $this->students),
            'subjects'      => $this->when(request()->subjects, $this->subjects),
            'address'      => $this->when(request()->address, $this->address),


        ];
    }
}
