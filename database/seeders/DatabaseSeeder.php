<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'password' => bcrypt('12341234'),
            'level' => 'Admin',
            'telp' => '+6282268556712',
        ]);

        Jurusan::create([
            'kode_jurusan' => 'TI',
            'nama_jurusan' => 'Teknologi Informai',
        ]);

        Jurusan::create([
            'kode_jurusan' => 'TM',
            'nama_jurusan' => 'Teknik Mesin',
        ]);

        Jurusan::create([
            'kode_jurusan' => 'AB',
            'nama_jurusan' => 'Administrasi Bisnis',
        ]);

        Kelas::create([
            'jurusan_id' => '1',
            'nama_kelas' => 'MI 1 A',
        ]);

        Kelas::create([
            'jurusan_id' => '1',
            'nama_kelas' => 'MI 1 B',
        ]);

        Kelas::create([
            'jurusan_id' => '1',
            'nama_kelas' => 'MI 1 C',
        ]);

        Kelas::create([
            'jurusan_id' => '2',
            'nama_kelas' => 'ME 1 A',
        ]);
    }
}
