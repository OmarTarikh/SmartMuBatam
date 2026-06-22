<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        User::create([
            'name'=>'Super Admin',
            'email'=>'superadmin@gmail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'superadmin'
        ]);

        User::create([
            'name'=>'Admin Cabang',
            'email'=>'cabang@gmail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'cabang'
        ]);

        User::create([
            'name'=>'Admin Ranting',
            'email'=>'ranting@gmail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'ranting'
        ]);

        User::create([
            'name'=>'Admin AUM',
            'email'=>'aum@gmail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'aum'
        ]);

        User::create([
            'name'=>'Admin Masjid',
            'email'=>'masjid@gmail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'masjid'
        ]);

        User::create([
            'name'=>'Admin Keuangan',
            'email'=>'keuangan@gmail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'keuangan'
        ]);

    }
}