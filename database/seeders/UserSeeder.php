<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'name11',
            'username' => 'username11',
            'phone_number' => '012334511',
            'address' => 'address11',
            'first_name' => 'first_name11',
            'last_name' => 'last_name11',
            'email' => 'useremail11' . '@gmail.com',
            'password' => Hash::make('username11')
        ]);

        User::factory()->create([
            'name' => 'name12',
            'username' => 'username12',
            'phone_number' => '0123345113',
            'address' => 'address113',
            'first_name' => 'first_name113',
            'last_name' => 'last_name113',
            'email' => 'useremail113' . '@gmail.com',
            'password' => Hash::make('username12')
        ]);
    }
}
