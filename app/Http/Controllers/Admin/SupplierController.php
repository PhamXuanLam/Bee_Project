<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::query()->get();
        $data = [
            'suppliers' => $suppliers
        ];
        return view('admin.supplier.index', $data);
    }
    public function create()
    {
        return view('admin.supplier.create');
    }
    public function store(SupplierRequest $request)
    {
        $supplier = new Supplier();
        $parrams = $request->only('name', 'email', 'address', 'phone_number');

        $supplier->fill($parrams);
        $supplier->save();

        return redirect()->route('supplier.index')->with('success', 'Thêm dữ liệu thành công');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('admin.supplier.edit', ['supplier' => $supplier]);
    }

    public function update(SupplierRequest $request)
    {
        $supplier = Supplier::find($request->get('id'));
        $parrams = $request->only('name', 'email', 'address', 'phone_number');
        $supplier->fill($parrams);
        $supplier->save();

        return redirect()->route('supplier.index')->with('success', 'Sửa dữ liệu thành công');
    }
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Xóa dữ liệu thành công');
    }
}
