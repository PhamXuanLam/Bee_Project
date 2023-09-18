<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $model = new Supplier();
            $data = [
                'name' => 'suppiler' . $i,
                'email' => 'supplier' . $i . '@gmail.com',
                'address' => 'HaNoi' . $i,
                'phone_number' => '012345648' . $i
            ];

            $model->fill($data);
            $model->save($data);
        }
    }
}
