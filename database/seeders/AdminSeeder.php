<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 4; $i <= 8; $i++) {
            $admin = new Admin();
            $parrams = [
                'username' => 'admin' . $i,
                'password' => Hash::make('admin' . $i),
                'status' => random_int(1, 2)
            ];
            $admin->fill($parrams);
            $admin->save();
        }
        //
    }
}
