<?php

namespace Database\Seeders;

use App\Models\Subscribes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscribesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $model = new Subscribes();
            $model->fill(['email' => 'email-' . $i . '@gmail.com']);
            $model->save();
        }
    }
}
