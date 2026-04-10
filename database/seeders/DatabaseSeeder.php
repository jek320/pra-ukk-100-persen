<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::firstOrCreate(
            ['username' => 'admin'],
            ['password' => Hash::make('admin123')]
        );

        Siswa::firstOrCreate(
            ['nisn' => '1234567890'],
            ['nama' => 'Siswa Demo', 'password' => Hash::make('password')]
        );
    }
}
