<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $adminList = Admin::query()->paginate(5);
        return view('admin.Admin.index', ['adminList' => $adminList]);
    }

    public function show(int $id)
    {
        $admin = Admin::query()->find($id);
        return view('admin.Admin.show', ['admin' => $admin]);
    }
}
