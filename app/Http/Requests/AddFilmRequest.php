<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFilmRequest extends FormRequest
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
            'title_vn'=>'required',
            'title_en'=>'required',
            'catefilm'=>'required',
            'descreption'=>'required',
            'year'=>'required',
            'date_theater'=>'required',
            'quanlity'=>'required',
            'resolution' =>'required',
            'IMDb'=>'required',
            'txtuser'=>'required',
            'img_thumb'=>'required',
            'img_bg'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title_vn.required'=>'Vui lòng nhập tiêu đề tiếng việt!',
            'title_en.required'=>'Vui lòng nhập tiêu đề tiếng anh!',
            'catefilm'=>'Bạn chưa chọn chuyên mục!',
            'descreption.required'=>'vui lòng nhập mô tả!',
            'year.required'=>'Vui lòng nhập năm xuất bản!',
            'date_theater.required'=>'Vui lòng nhập ngày chiếu Rạp!',
            'quanlity.required' =>'Vui lòng nhập chất lượng!',
            'resolution.required'=>'vui lòng nhập độ phân giải!',
            'IMDb.required'=>'vui lòng nhập điểm!',
            'txtuser.required' =>'Vui lòng chọn người đăng!',
            'img_thumb.required'=>'Bạn chưa chọn ảnh đại điện!',
            'img_bg.required'=>'Bạn chưa chọn ảnh background!'
        ];
    }
}
