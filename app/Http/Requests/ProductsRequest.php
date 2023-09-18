<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;


class ProductsRequest extends FormRequest
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
            case "App\Http\Controllers\Admin\ProductsController@store":
                return [
                    'name' => ["required", 'unique:products', "string", "min:6", "max:100"],
                    'category_id' => ['required'],
                    'supplier_id' => ['required'],
                    'status' => ["required", "numeric", "in:1,2"],
                    'price' => ['required', 'numeric'],
                    'image' => ['required'],
                    'description' => ['required'],
                    'content' => ['required', "min:6", "max:100"],
                ];
            case "App\Http\Controllers\Admin\ProductsController@update":
                return [
                    'name' => ["string", "min:6", "max:100"],
                    'status' => ["numeric", "in:1,2"],
                    'price' => ['numeric'],
                    'content' => ["min:6", "max:100"],
                ];
            default:
                return [];
        }
    }
}
