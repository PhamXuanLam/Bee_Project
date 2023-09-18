<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductSearchController extends Controller
{
    //
    public function index(Request $request){
        $keyword = $request->get('q');
        $products = Products::query()->where('name','LIKE',"%{$keyword}%")->paginate(20);
        return view('web.productSearch.index',['products' =>$products]);
    }
}
