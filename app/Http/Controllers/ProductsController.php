<?php

namespace App\Http\Controllers;

use App\Models\ProductReviews;
use App\Models\Categories;
use App\Models\Products;
use App\Models\ProductWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function show($id)
    {
        $product = Products::query()
            ->with(['images'])
            ->where('id', $id)
            ->first();
        $products = Products::query()->whereNot('id', $id)->limit(4)->get();
        $reviews = ProductReviews::query()
            ->with(['user'])
            ->where('product_id', $id)
            ->where('status', ProductReviews::STATUS_ACTIVE)
            ->get();
        $data = [
            'product' => $product,
            'products' => $products,
            'reviews' => $reviews,
        ];
        return view('web.detail.index', $data);
    }

    public function index(Request $request, int $id)
    {
        $query = Products::query()
            ->where('status', Products::STATUS_ACTIVE)
            ->where('category_id', $id);

        $query = $request->get('sort') ?
            $query->orderBy('price', $request->get('sort')) : $query;

        $items = explode(',',$request->get('price'));
        foreach ($items as $item) {
            if ($item == Categories::KeyPrice[0]) {
                break;
            } elseif ($item == Categories::KeyPrice[1]) {
                $query = $query->where('price', '<', 50000);
            } elseif ($item == Categories::KeyPrice[2]) {
                $query = $query->whereBetween('price', [50000, 100000]);
            } elseif ($item == Categories::KeyPrice[3]) {
                $query = $query->whereBetween('price', [100000, 200000]);
            } elseif ($item == Categories::KeyPrice[4]) {
                $query = $query->whereBetween('price', [200000, 300000]);
            } elseif ($item == Categories::KeyPrice[5]) {
                $query = $query->where('price', '>', 300000);
            }
        }

        $products = $query->paginate(6);
        $category = Categories::query()->find($id);
        $data = [
            'products' => $products,
            'category' => $category
        ];
        return view('web.products.index', $data);
    }

    public function review(Request $request)
    {
        $review = new ProductReviews();
        $params = $request->only(['product_id', 'rate', 'content']);
        $params['user_id'] = Auth::user()->getAuthIdentifier();
        $params['status'] = ProductReviews::STATUS_INACTIVE;
        $review->fill($params);
        $review->save();
        return response()->json(['success' => 'Đánh giá của bạn đã được gửi đi!']);
    }

    public function favourite(Request $request)
    {
        $favourite = new ProductWishlist();
        $user = Auth::user();
        $parrams['product_id'] = $request->get('productId');
        $parrams['user_id'] = ($user->id);
        $productforUser =
            ProductWishlist::query()
            ->select('product_id', 'user_id')
            ->where('user_id', $user->id)
            ->where('product_id',$request->get('productId'))
            ->get();
        if(empty($productforUser->toArray())){
            $favourite->fill($parrams);
            $favourite->save();
        }
        return response()->json([
            "status" => true,
            "message" => "Danh mục đã được thêm thành công vào mục yêu thích"
        ]);
    }
}
