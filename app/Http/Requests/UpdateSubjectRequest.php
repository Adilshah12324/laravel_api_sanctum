<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
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
        $code = 'regex:/^[A-Z]{2}\d{3}$/';
        return [
            'title' => ['required','max:20'],
            'code'  => ['required','unique:subjects,code',$code],
        ];
    }
}
