<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        ];
    }
}
