<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\Orders;
use App\Services\CartServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private CartServices $cartServices;

    public function __construct(CartServices $cartServices)
    {
        $this->cartServices = $cartServices;
    }

    public function index()
    {
        $cart = session('cart', []);
        $data = $this->cartServices->get($cart);
        return view('web.checkout.index', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $cart = session('cart');
            $data = $this->cartServices->get($cart);
            $auth = Auth::user();
            $order = new Orders();
            $order->fill([
                'user_id' => $auth->id,
                'status' => 1,
                'total' => $data['total'],
                'tax' => $data['tax'],
                'discount' => 0,
            ]);
            $order->save();
            $products = $data['products'];
            foreach ($products as $product) {
                $orderItem = new OrderItems();
                $orderItem->fill([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'qty' => $product->qty,
                    'price' => $product->price,
                    'total' => $product->total
                ]);
                $orderItem->save();
            }
            DB::commit();
            Session::forget('cart');
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new $exception;
        }
        return view('web.checkout.success');
    }
}
