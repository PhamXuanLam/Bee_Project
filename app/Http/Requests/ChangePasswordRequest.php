<?php

namespace App\Http\Requests;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => ['required'],
            'password' => [
                'required',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/', // Minimum 4 characters, at least one letter and one number
                'confirmed'
                ],
        ];
    }
}
