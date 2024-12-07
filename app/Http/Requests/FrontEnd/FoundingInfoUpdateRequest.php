<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class FoundingInfoUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'industry_type' => ['required', 'integer'],
            'organization_size' => ['required', 'integer'],
            'team_size' => ['required', 'integer'],
            'establishment_date' => ['required', 'date'],
            'website_url' => ['required', 'active_url'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'country' => ['integer'],
            'state' => ['integer'],
            'city' => ['integer'],
            'address' => ['required', 'string', 'max:255'],
            'map_link' => ['nullable'],
        ];
    }
}
