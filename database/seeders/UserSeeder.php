<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin', // Jika Anda ingin username juga unik dan relevan
            'password' => bcrypt('adminadmin'), // Enkripsi password menggunakan bcrypt
            'email_verified_at' => now(), // Jika Anda ingin email diverifikasi langsung
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
