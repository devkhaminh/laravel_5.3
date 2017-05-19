<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'txtUser'=>'required|unique:users,username',
            'txtPass'=>'required',
            'txtRePass'=>'required|same:txtPass',
            'txtEmail' => 'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/',// định dạng email
        ];
    }
    public function messages(){
        return [
            'txtUser.required'=>'Không được để trống tên đăng nhập',
            'txtUser.unique'=>'Trùng tên đăng nhập',
            'txtPass.required'=>'Không được để trống mật khẩu',
            'txtRePass.required'=>'Phải nhập lại mật khẩu',
            'txtRePass.same'=>'Mật khẩu không giống nhau',
            'txtEmail.required'=>'Không được để trống Email',
            'txtEmail.regex'=>'Không phải định dạng Email'
        ];
    }
    }
