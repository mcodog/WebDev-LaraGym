<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            'type' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'age.required' => 'Age is required',
            'gender.required' => 'Gender is required',
            'type.required' => 'Type is required',
            'status.required' => 'Status is required',
        ];
    }
}
