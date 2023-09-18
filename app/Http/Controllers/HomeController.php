<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Http\Requests\SubscribesRequest;
use App\Models\Subscribes;

class HomeController extends Controller
{
    public function index()
    {
        $productFeatures = Products::query()
            ->where('is_hot', Products::IS_HOT)
            ->limit(8)
            ->get();
        $categories = Categories::query()
            ->where('status', Categories::STATUS_ACTIVE)
            ->limit(8)
            ->get();
        $recentProducts = Products::query()
            ->where('status', Products::STATUS_ACTIVE)
            ->orderBy('created_at','DESC')
            ->limit(8)
            ->get();
            // dd($recentProducts);
        $data = [
            'categories' => $categories,
            "productFeatures" => $productFeatures,
            'recentProducts' => $recentProducts
        ];

        return view("web.home.index", $data);
    }
}
