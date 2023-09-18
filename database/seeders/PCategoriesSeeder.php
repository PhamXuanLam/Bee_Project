<?php

namespace Database\Seeders;

use App\Models\Blog\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        for($i = 1; $i<=10; $i++){
            $category = new Categories();
            $parrams = [
                'name' => 'Category-' .$i,
                'content' => 'Content-'.$i,
                'status' => random_int(1,2)
            ];
            $category->fill($parrams);
            $category->save();
        }
    }
}
