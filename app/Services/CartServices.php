<?php

namespace App\Services;

use App\Models\Products;

class CartServices
{
    public function get(array $cart): ?array
    {
        if (empty($cart))
            return [];
        $productIdList = array_keys($cart);
        $products = Products::query()->whereIn('id', $productIdList)->get();
        $products = $products->map(function (Products $product) use ($cart) {
            $product->qty = $cart[$product->id];
            $product->total = $product->qty * $product->price;
            return $product;
        });
        $total = $products->sum('total');
        $tax = $total * 10/100;
        $subTotal = $total + $tax;
        return [
            'products' => $products,
            'total' => $total,
            'subTotal' => $subTotal,
            'tax' => $tax
        ];
    }
}
