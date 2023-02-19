<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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

        ];
    }
}
