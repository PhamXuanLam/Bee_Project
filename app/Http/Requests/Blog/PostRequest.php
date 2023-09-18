<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class PostRequest extends FormRequest
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
            case "App\Http\Controllers\Admin\Blog\PostController@store":
                return [
                    'name' => 'required|unique:p_posts',
                    'category_id' => 'required|exists:App\Models\Blog\Categories,id',
                    'image' => 'required|image',
                    'content' => 'required',
                    'description' => 'required|min:6|max:200',
                    'status' => 'required|in:1,2'
                ];
            case "App\Http\Controllers\Admin\Blog\PostController@update":
                return [
                    'name' => 'required',
                    'category_id' => 'required|exists:App\Models\Blog\Categories,id',
                    'content' => 'required',
                    'description' => 'required|min:6|max:200',
                    'status' => 'required|in:1,2'
                ];
        }
        // dd($this->controllerAction);

    }
}
