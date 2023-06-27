<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = [
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('admin123')
            ],
            [
                'name'=>'admin2',
                'email'=>'admin2@gmail.com',
                'password'=>Hash::make('admin345')
            ],
        ];
        foreach ($admin as $admins) {
            User::create($admins);
        }
    }
}
