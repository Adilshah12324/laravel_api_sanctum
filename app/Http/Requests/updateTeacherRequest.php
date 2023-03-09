<?php

namespace App\Http\Requests;

use App\Models\School;
use Illuminate\Foundation\Http\FormRequest;

class updateTeacherRequest extends FormRequest
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
            'name'          => ['required','max:255'],
            'phone'         => ['required','string','max:255'],
            'email'         => ['required','email','unique:teachers,email'],
            'age'           => ['required','max:255'],
            'qualification' => ['required','max:255'],
            'specialization'=> ['required','max:255'],
            'experience'    => ['required','max:255'],
            'street'        => ['required','max:255'],
            'city'          => ['required','max:255'],
            'country'       => ['required','max:255'],
        ];
    }
}
