<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsImageRequest;
use App\Models\Products;
use App\Models\ProductsImage;
use Illuminate\Http\Request;

class ProductsImagesController extends Controller
{
    public function index($id)
    {
        $product = Products::query()
            ->select('id')
            ->find($id);
        $productImage = ProductsImage::query()->where('product_id', $product->id)->paginate(3);
        // dd($productImage);
        $data = [
            'product' => $product,
            'productImage' => $productImage
        ];
        return view('admin.productsImage.index', $data);
    }

    public function store(ProductsImageRequest $request, $id)
    {
        $product = Products::query()
            ->select('id')
            ->find($id);
        $productImg = new ProductsImage();
        $file = $request->file('path');
        $fileName =  time() . '_' . $file->getClientOriginalName();
        $file->move(public_path(ProductsImage::DIRECTORY_PRODUCTS), $fileName);
        $params['path'] = Products::DIRECTORY_PRODUCTS . '/' . $fileName;
        $params['product_id'] =  $product->id;
        $params['name'] =   $fileName;
        $productImg->fill($params);
        $productImg->save();

        return redirect()->route('products.image.index', ['id' => $product->id]);
    }
}
