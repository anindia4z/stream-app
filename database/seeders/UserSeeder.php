<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Iluminate\Support\Facades\DB as FacadesDB;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'phone_number' => '0987654321',
            'avatar' => '',
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

       /* DB::table('users')->insert([
            'name' => 'Anin',
            'email' => 'anin@mail.com',
            'password' => Hash::make('anin123'),
            'phone_number' => '09987654321',
            'avatar' => '',
            'role' => 'member',
            'created_at' => now(),
            'updated_at' => now()
        ]); */
    }
}
