<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addTagRequest extends FormRequest
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
            'txttags'=>'required'

        ];
    }
    public  function  messages()
    {
       return [
           'txttags.required' =>'Vui lòng nhập tên Tag'
       ];
    }
}
