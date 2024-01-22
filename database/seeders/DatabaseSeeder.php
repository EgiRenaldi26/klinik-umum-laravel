<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Egi Renaldi',
            'username' => 'egirenaldi',
            'password' => Hash::make('egirenaldi'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Renaldi Nurmazid',
            'username' => 'renaldi',
            'password' => Hash::make('renaldi'),
            'role' => 'dokter',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'M.W Syawali',
            'username' => 'msyawali',
            'password' => Hash::make('msyawali'),
            'role' => 'farmasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'David Lutfi',
            'username' => 'davidlutfi',
            'password' => Hash::make('davidlutfi'),
            'role' => 'kasir',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
