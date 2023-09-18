<?php

namespace App\Http\Controllers\Admin\Blog;


use App\Http\Requests\Blog\CategoriesRequest;
use App\Http\Controllers\Controller;
use App\Models\Blog\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::query()->get();
        $data = [
            'categories' => $categories
        ];
        return view('admin.blog.pCategories.index', $data);
    }

    public function show($id)
    {
        $category = Categories::find($id);
        $data = ['category' => $category];
        return view('admin.blog.pCategories.show', $data);
    }

    public function create()
    {
        return view('admin.blog.pCategories.create');
    }

    public function store(CategoriesRequest $request)
    {
        $category = new Categories();
        $parrams = $request->only('name', 'content', 'status');
        $category->fill($parrams);
        $category->save();
        return redirect('/admin/blog/categories')->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        $data = [
            'category' => $category
        ];
        return view('admin.blog.pCategories.edit', $data);
    }

    public function update(CategoriesRequest $request)
    {
        $category = Categories::find($request->get('id'));
        $parrams = $request->only('name', 'content', 'status');
        $category->fill($parrams);
        $category->save();
        return redirect('/admin/blog/categories')->with('success', 'Sửa dữ liệu thành công');
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect('/admin/blog/categories')->with('success', 'Xóa dữ liệu thành công');
    }
}
