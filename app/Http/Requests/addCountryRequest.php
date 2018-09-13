<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCountryRequest extends FormRequest
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
            'txtcountry' =>'required'
        ];
    }
    public function messages()
    {
        return [
            'txtcountry.required'=>'vui lòng nhập tên quốc gia !'
        ];
    }
}
