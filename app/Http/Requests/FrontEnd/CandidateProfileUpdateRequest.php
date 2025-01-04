<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class CandidateProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gender' => ['required', 'in:male,female'],
            'marital_status' => ['required', 'in:married,single'],
            'profession' => ['required', 'integer'],
            'availability' => ['required', 'in:available,not_available'],
            'skills' => ['required'],
            'language' => ['required'],
            'bio' => ['required'],
        ];
    }
}
