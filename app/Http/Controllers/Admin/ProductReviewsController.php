<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReviews;
use App\Http\Requests\ProductReviewsRequest;
use App\Models\Products;

class ProductReviewsController extends Controller
{
    public function index(int $id)
    {
        $reviews = ProductReviews::query()
            ->with(['user'])
            ->where('product_id', $id)
            ->paginate(5);
        return view('admin.products.reviews.index', ['reviews' => $reviews]);
    }

    public function update(ProductReviewsRequest $request)
    {
        $params = $request->only(['reviewId', 'productId', 'status', 'star']);
        $review = ProductReviews::query()->find($params['reviewId']);
        $product = Products::query()->find($params['productId']);
        if ($params['status'] != $review->status) {
            $count = ProductReviews::query()
                ->where('product_id', $params['productId'])
                ->count();
            $sumPoint = ProductReviews::query()
                ->where('product_id', $params['productId'])
                ->sum('rate');
            if ($params['status'] == ProductReviews::STATUS_ACTIVE) {
                $count += 1;
                $sumPoint += (float)$params['star'];
            } else {
                $count -= 1;
                $sumPoint -= (float)$params['star'];
            }
            $product->fill([
                'rate_count' => $count,
                'rate_point' => $sumPoint / $count,
            ]);
            $product->save();

            $review->fill(['status' => $params['status']]);
            $review->save();
        }
        return redirect(\Illuminate\Support\Facades\Request::url());
    }
}
