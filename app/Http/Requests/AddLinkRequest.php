<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLinkRequest extends FormRequest
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
           'txtlink' =>'required',
            'descreption'=>'required'
        ];
    }
    public function  messages()
    {
        return [
          'txtlink.required'=>'Vui lòng nhập Link',
          'descreption.required'=>'Vui Lòng Nhập Mô Tả'
        ];
    }
}
