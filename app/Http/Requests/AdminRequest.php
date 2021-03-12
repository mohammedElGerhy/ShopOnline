<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'password'   => 'required_without:id',
            'photo' => 'required_without:id|mimes:jpg,jpeg,png'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'this name is required',
            'name.string' => 'file this input string',
            'email.required' => 'this email is required',
            'email.email' => 'file this input email',
            'password.required_without' => 'this password is required',
            'photo.required_without' => 'this photo is required',

        ];
    }
}
