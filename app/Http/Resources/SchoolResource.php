<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $students
 * @property mixed $id
 * @property mixed $user_id
 * @property mixed $website
 * @property mixed $strength
 * @property mixed $phone
 * @property mixed $teachers
 */
class SchoolResource extends JsonResource
{
    public static $wrap = 'schools';
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
            'user_id' => $this->user_id,
            'website' => $this->website,
            'strength'=> $this->strength,
            'phone'   => $this->phone,
            'students'=> $this->when(request()->students, $this->students),
            'teachers'=> $this->when(request()->teachers, $this->teachers),
        ];
    }
}
