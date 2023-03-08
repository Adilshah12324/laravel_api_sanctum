<?php

namespace App\Http\Requests;

use App\Models\School;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
        $schoolIdsString = join(',',School::pluck('id')->toArray());
        return [
            'school_id'     => ['required', 'in:' . $schoolIdsString], 
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
            'profile_image'         => ['nullable','image','max:1024'], // Max 1MB
        ];
    }
}
