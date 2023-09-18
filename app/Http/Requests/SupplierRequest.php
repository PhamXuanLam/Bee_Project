<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'addres' => 'required',
            'phone_number' => 'required',


        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'email' => ':attribute không đúng định dạng'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên nhà cung cấp',
            'email' => 'Email',
            'addres' => 'Địa chỉ',
            'phone_number' => 'Số điện thoại'
        ];
    }
}
