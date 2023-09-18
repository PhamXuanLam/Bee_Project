<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::query()->with('users')->paginate(10);

        $data = [
            'orders' => $orders
        ];
        return view('admin.orders.index', $data);
    }

    public function show($id)
    {
        $order = Orders::query()
            ->with('users')
            ->find($id);
        $orderItems = OrderItems::query()
            ->with('product')->where('order_id', $id)->get();
        $data = [
            'order' => $order,
            'orderItems' => $orderItems,
        ];
        return view('admin.orders.show', $data);
    }
}
