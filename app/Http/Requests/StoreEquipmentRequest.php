<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentRequest extends FormRequest
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
            'description' => 'required',
            'category' => 'required',
            'manufacturer' => 'required',
            'dimension' => 'required',
            'weight' => 'required',
            'cost' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'Description is required',
            'category.required' => 'Category is required',
            'manufacturer.required' => 'Manufacturer is required',
            'dimension.required' => 'Dimension is required',
            'weight.required' => 'Weight is required',
            'cost.required' => 'Cost is required',
        ];
    }
}
