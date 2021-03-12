<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name_ar" => "required|string|max:100",
            "name_en" => "required|string|max:100",
        ];
    }
    public function messages()
    {
        return [
            'name_ar.required' => 'this name is required Arabic',
            'name_ar.string' => 'file this input string Arabic',
            'name_en.required' => 'this name is required Engltion',
            'name_en.string' => 'file this input string Engltion',
        ];
    }
}
