<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'       => ['required','max:255'],
            'father_name'=> ['required','max:255'],
            'dob'        => ['required','max:255'],
            'roll_no'    => ['required','integer','unique:students,roll_no'],
            'fees'       => ['required','max:255'],
            'street'     => ['required','max:255'],
            'city'       => ['required','max:255'],
            'country'    => ['required','max:255'],
        ];
    }
}
