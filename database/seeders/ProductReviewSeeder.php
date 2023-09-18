<?php

namespace Database\Seeders;

use App\Models\ProductReviews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;
use App\Models\User;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Products::query()->get();
        $users = User::query()->get();

        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'product_id' => $products->random()->id,
                'user_id' => $users->random()->id,
                'rate' => rand(1, 5),
                'content' => 'review-' . $i,
                'status' => random_int(1, 2)
            ];
            $productReview = new ProductReviews();
            $productReview->fill($data);
            $productReview->save();
        }
    }
}
