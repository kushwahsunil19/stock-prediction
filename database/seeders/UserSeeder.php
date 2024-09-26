<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([               
            'role_type' => 'superadmin',
        ],
        [
            'first_name' => 'superadmin',
            'last_name' => '',
            'email' => 'admin@mailinator.com',       
            'password' => Hash::make('123456'),
            'gender' => 'male',    
            'role_type' => 'superadmin',        
            'mobile' => '9999999999',
            'status' => '1',
        ]);
    }
}
