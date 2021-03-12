<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'from_date' => 'required',
            'to_date' => 'required',
            'discount' => 'string',
            'conten' => 'string',
            'item_id' => 'required|exists:items,id',

        ];
    }
    public function messages()
    {
        return [
            'from_date.required' => 'this name is required Arabic',
            'to_date.required' => 'file this input string Arabic',
            'discount.string' => 'this name is required Engltion',
            'conten.string' => 'file this input string Engltion',
            'item_id.exists'  => 'القسم غير موجود ',
        ];
    }
}
