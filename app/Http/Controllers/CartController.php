<?php

namespace App\Http\Controllers;

use App\Services\CartServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
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
        return view('web.cart.index', $data);
    }

    public function store(Request $request)
    {
        $productId = (int)$request->get('productId');
        $qty = (int)$request->get('qty');
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId] = $cart[$productId] + $qty;
        } else {
            $cart[$productId] = $qty;
        }
        $request->session()->put('cart', $cart);
        return redirect('/cart');
    }

    public function update(Request $request) {
        $productId = (int)$request->get('productId');
        $qty = (int)$request->get('qty');
        $cart = $request->session()->get('cart');
        $cart[$productId] = $qty;
        $request->session()->put('cart', $cart);
        return response()->json(['message' => 'success']);
    }

    public function destroy(Request $request)
    {
        $productId = (int)$request->get('productId');
        $cart = $request->session()->get('cart');
        unset($cart[$productId]);
        $request->session()->put('cart', $cart);
        return response()->json(['message' => 'success']);
    }
}
