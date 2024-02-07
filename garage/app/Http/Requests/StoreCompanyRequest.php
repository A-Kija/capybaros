<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|min:2|max:100',
            'type' => 'required|in:UAB,VšĮ,AB,MB,IĮ',
          ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Įmonės pavadinimas yra privalomas',
            'name.min' => 'Įmonės pavadinimas turi būti ilgesnis nei 2 simboliai',
            'name.max' => 'Įmonės pavadinimas turi būti trumpesnis nei 100 simboliai',
            'type.required' => 'Įmonės tipas yra privalomas',
            'type.in' => 'Neteisingas įmonės tipas'
        ];
    }
}
