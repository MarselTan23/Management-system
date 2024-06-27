<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iurans')->insert([
            'keterangan' => 'kas',
            'nominal' => 5000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
