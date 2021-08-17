<?php

namespace Database\Seeders;

use App\Models\User;
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
        //
        User::create([
            'name'=>'admin',
            'email'=>'admin@mail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'admin'
        ]);
        User::create([
            'name'=>'penulis',
            'email'=>'penulis@mail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'writters'
        ]);
        User::create([
            'name'=>'pembaca',
            'email'=>'pembaca@mail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'readers'
        ]);
    }
}
