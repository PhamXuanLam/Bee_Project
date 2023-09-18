<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::query()->paginate(5);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function show(int $id)
    {
        $category = Categories::query()->find($id);
        return view('admin.categories.show', ['category' => $category]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoriesRequest $request)
    {
        $params = $request->only(['name', 'slug', 'status', 'seq']);
        $category = new Categories();
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path(Categories::DIRECTORY_CATEGORIES), $fileName);
        $params['image'] = Categories::DIRECTORY_CATEGORIES . '/' . $fileName;
        $category->fill($params);
        $category->save();
        return redirect("/admin/categories");
    }

    public function edit(int $id)
    {
        $category = Categories::query()->find($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(CategoriesRequest $request)
    {
        $category = Categories::query()->find($request->get('id'));
        $params = $request->only(['name', 'slug', 'status', 'seq']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path(Categories::DIRECTORY_CATEGORIES), $fileName);
            $params['image'] = Categories::DIRECTORY_CATEGORIES . '/' . $fileName;
        }
        // dd($fileName);
        $category->fill($params);
        $category->save();
        return redirect("/admin/categories");
    }

    public function destroy(int $id)
    {
        $category = Categories::query()->find($id);
        $category->delete();
        return response()->json([
            "status" => true,
            "message" => "Danh mục đã được xoá thành công"
        ]);
    }
}
