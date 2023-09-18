<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::query()->get();
        $suppliers = Supplier::query()->get();
        $query = Products::query()
            ->with(['category', 'supplier']);
        if ($request->get('keyword')) {
            $query = $query->where('name', 'LIKE', "%{$request->input('keyword')}%");
        }
        if ($request->get('category_id')) {
            $query = $query->where('category_id', $request->get('category_id'));
        }
        if ($request->get('supplier_id')) {
            $query = $query->where('supplier_id', $request->get('supplier_id'));
        }
        if ($request->get('status')) {
            $query = $query->where('status', $request->get('status'));
        }
        $products = $query->paginate(5);
        $data = [
            'products' => $products,
            'categories' => $categories,
            'suppliers' => $suppliers,
        ];

        return view('admin.products.index', $data);
    }

    public function update(ProductsRequest $request)
    {
        $params = $request->only(['name', 'category_id', 'supplier_id', 'slug', 'status', 'price', 'description', 'content']);
        $product = Products::query()->find($request->get('id'));
        $file = $request->file('image');
        if ($file) {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path(Products::DIRECTORY_PRODUCTS), $fileName);
            $params['image'] = Products::DIRECTORY_PRODUCTS . '/' . $fileName;
        }
        if ($request->get('is_hot') != Products::IS_HOT)
            $params['is_hot'] = Products::NOT_IS_HOT;
        $product->fill($params);
        $product->save();
        return redirect("/admin/products");
    }

    public function create()
    {
        $model = Categories::query()->where('status', Categories::STATUS_ACTIVE)->get();
        $categories = $model->pluck('name', 'id');
        $model = Supplier::query()->get();
        $suppliers = $model->pluck('name', 'id');
        return view('admin.products.create', ['categories' => $categories, 'suppliers' => $suppliers]);
    }

    public function store(ProductsRequest $request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path(Products::DIRECTORY_PRODUCTS), $fileName);
        $product = new Products();
        $params = $request->only(['name', 'category_id', 'is_hot', 'supplier_id', 'slug', 'status', 'price', 'description', 'content']);
        $params['image'] = Products::DIRECTORY_PRODUCTS . '/' . $fileName;
        $product->fill($params);
        $product->save();
        return redirect("/admin/products");
    }

    public function edit(int $id)
    {
        $categories = Categories::query()->pluck('name', 'id');
        $suppliers = Supplier::query()->pluck('name', 'id');
        $product = Products::query()->find($id);
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories, 'suppliers' => $suppliers]);
    }

    public function show(int $id)
    {
        $product = Products::query()->find($id);
        return view('admin.products.show', ['product' => $product]);
    }

    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $model = Products::query()->find($id);
        if ($model) {
            $model->delete();
            $data = [
                'msg' => 'Xóa sản phẩm thành công',
                'status' => true,
            ];
        } else {
            $data = [
                'msg' => 'Xóa sản phẩm thất bại',
                'status' => false,
            ];
        }
        return response()->json($data);
    }
}
