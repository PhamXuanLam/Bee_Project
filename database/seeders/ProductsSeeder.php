<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $categories = Categories::query()->where('name', 'LIKE', '%Iphone%')->get();
        // dd($categories);
        $color = ['Màu Trắng', 'Màu Đen', 'Vàng Gold'];
        $size = ['32GB', '64GB'];

        for ($i = 0; $i < count($categories); $i++) {
            for ($j = 0; $j < count($size); $j++) {
                for ($k = 0; $k < count($color); $k++) {
                    $product = new Products();
                    $data = [
                        'category_id' => $categories[$i]->id,
                        'supplier_id' => $i,
                        'name' => $categories[$i]->name . ' - ' . $size[$j] . ' - ' . $color[$k],
                        'status' => random_int(1, 2),
                        'image' => $categories[$i]->image,
                        'price' => (90 + $i) * 1000,
                        'description' => 'description-' . $i,
                        'content' => 'content-' . $i
                    ];
                    $product->fill($data);
                    $product->save();
                }
            }

        }
    }
}
