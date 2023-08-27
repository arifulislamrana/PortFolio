<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateResume extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'degree_name' => 'required|string',
            'institute' => 'required|string',
            'institute_src' => 'string',
            'description' => 'required|string',
            'starting' => 'required|string',
            'ending' => 'string',
        ];
    }
}
