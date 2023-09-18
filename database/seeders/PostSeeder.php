<?php

namespace Database\Seeders;

use App\Models\Blog\Categories;
use App\Models\Blog\Posts;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Categories::query()
            ->get();
        $id = [];
        foreach ($category as $item) {
            array_push($id, $item->id);
        }

        for ($i = 1; $i < 10; $i++) {
            $posts = new Posts();
            $parrams = [
                'category_id' => array_rand($id),
                'name' => 'NamePost' . $i,
                'image' => 'path-' . $i,
                'description' => 'description-' . $i,
                'content' => 'description-' . $i,
                // 'pushlished_at' => 'pushlish_at-' . $i,
                'status' => random_int(1, 2)
            ];
            $posts->fill($parrams);
            $posts->save();
        }
    }
}
