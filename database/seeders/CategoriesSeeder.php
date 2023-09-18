<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 1; $i <= 10; $i++) {
        //     $category = new Categories();
        //     $data = [
        //         'name' => 'Category-' . $i,
        //         'status' => random_int(1, 2),
        //         'seq' => random_int(1, 10)
        //     ];
        //     $category->fill($data);
        //     $category->save();
        // }

        for ($i = 7; $i <= 14; $i++) {
            if ($i == 9 || $i == 10) {
                continue;
            } else {
                $category = new Categories();
                $data = [
                    'name' => 'Iphone-' . $i,
                    'status' => random_int(1, 2),
                    'image' => 'media/categories/iphone/iphone' . $i . '.png',
                    'seq' => random_int(1, 10)
                ];
                $category->fill($data);
                $category->save();
            }
        }
    }
}
