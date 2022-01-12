<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pekerjaan::create([
            'nama' => 'Mahasiswa'
        ]);
        Pekerjaan::create([
            'nama' => 'Dosen/Guru'
        ]);
        Pekerjaan::create([
            'nama' => 'Pegawai/Karyawan'
        ]);
        Pekerjaan::create([
            'nama' => 'Lainnya'
        ]);
    }
}
