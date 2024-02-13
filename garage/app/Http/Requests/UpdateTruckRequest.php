<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTruckRequest extends FormRequest
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
            'brand' => 'required|string|min:2|max:64',
            'plate' => 'required|string|regex:/^[A-Z]{3}-[0-9]{3}$/', // ABC-123
            'mechanic_id' => 'sometimes|array',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'brand.required' => 'Nėra įvestas markės pavadinimas',
            'brand.string' => 'Markės pavadinimas turi būti tekstas',
            'brand.min' => 'Markės pavadinimas turi būti bent 2 simboliai',
            'brand.max' => 'Markės pavadinimas turi būti ne ilgesnis nei 64 simboliai',
            'plate.required' => 'Nėra įvestas numeris',
            'plate.string' => 'Numeris turi būti tekstas',
            'plate.regex' => 'Numeris turi būti tokiu formatu: ABC-123',
        ];
    }
}
