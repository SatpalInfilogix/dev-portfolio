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
     */
    public function run(): void
    {
        User::create([
            'name' => 'Satpal Singh Sekhon',
            'email' => 'admin@gmail.com',
            'phone_number' => '9876543210',
            'address' => 'Mohali, Chandigarh',
            'password' => Hash::make('123456')
        ]);
    }
}
