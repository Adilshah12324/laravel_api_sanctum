<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $school_id
 * @property mixed $name
 * @property mixed $roll_no
 * @property mixed $fees
 * @property mixed $teachers
 * @property mixed $subjects
 * @property mixed $school
 */
class StudentResource extends JsonResource
{
    public static $wrap = 'students';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'school_id' => $this->school_id,
            'name'      => $this->name,
            'roll_no'   => $this->roll_no,
            'fees'      => $this->fees,
            'subjects'  => $this->when(request()->subjects, $this->subjects),
            'teachers'  => $this->when(request()->teachers, $this->teachers),
            'school'  => $this->when(request()->school, $this->school),
            'address'   => $this->when(request()->address, $this->address),
        ];
    }
}
