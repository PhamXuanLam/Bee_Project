<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;


class CategoriesRequest extends FormRequest
{
    private $controllerAction;
    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        $this->controllerAction = Route::current()->action['controller'];
    }
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
        switch ($this->controllerAction) {
            case "App\Http\Controllers\Admin\CategoriesController@store":
                return [
                    'name' => ["required", "string", "unique:categories", "max:100"],
                    'status' => ["required", "numeric", "in:1,2"],
                    'image' => 'required|image',
                    'seq' => ['required', 'numeric']
                ];
            case "App\Http\Controllers\Admin\CategoriesController@update":
                return [
                    'name' => ["required", "string",     "max:100"],
                    'status' => ["required", "numeric", "in:1,2"],
                    // 'image' => 'image',
                    'seq' => ['required', 'numeric']
                ];
        }
    }
}
