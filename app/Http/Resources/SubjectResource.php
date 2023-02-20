<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $code
 * @property mixed $school
 * @property mixed $teachers
 * @property mixed $students
 */
class SubjectResource extends JsonResource
{
    public static $wrap = 'subjects';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'      => $this->id,
            'title'   => $this->title,
            'code'    => $this->code,
            'school'  => $this->when(request()->school, $this->school),
            'teachers'=> $this->when(request()->teachers, $this->teachers),
            'students'=> $this->when(request()->students, $this->students),
        ];
    }
}
