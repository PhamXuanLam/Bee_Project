<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => "required",
            'username' => "required|unique:users|min:5|max:30",
            'password' => "required|min:5|max:30",
            'email' => "required|unique:users|email",

            'sex' => "required",

        ];
    }


    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'unique' => ':attribute đã tồn tại'
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'Họ Và Tên',
            'username' => 'Tên tài khoản',
            'password' => 'Mật khẩu',
            'sex' => 'Giới tính'
        ];
    }
}
