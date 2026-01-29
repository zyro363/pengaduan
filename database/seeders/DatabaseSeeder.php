<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Siswa;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Siswa
        Siswa::create([
            'nis' => 12345,
            'kelas' => 'XII RPL 1',
        ]);

        // Kategori
        Kategori::create(['ket_kategori' => 'Sarana']);
        Kategori::create(['ket_kategori' => 'Prasarana']);
        Kategori::create(['ket_kategori' => 'Kebersihan']);
    }
}
