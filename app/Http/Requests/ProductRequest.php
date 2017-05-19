<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sltParent'=>'required',
            'txtName'=>'required|unique:products,name',
            'fImages'=>'required|image',
        ];
    }
    public function messages(){
        return [
            'sltParent.required'=>'Phải chọn danh mục chứa sản phẩm',
            'txtName.required'=>'Phải nhập tên sản phẩm',
            'txtName.unique'=>'Trùng tên sản phẩm - Nhập lại',
            'fImages.required'=>'Phải Up ảnh cho sản phẩm',
            'fImages.image'=>'Không phải định dạng ảnh'
        ];
    }
}
