<?php

namespace Database\Seeders;

use App\Models\Koleksi;
use Illuminate\Database\Seeder;

class KoleksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Koleksi::create([
            'nama' => 'Karya Umum',
            'klasifikasi' => '000'
        ]);
        Koleksi::create([
            'nama' => 'Filsafat',
            'klasifikasi' => '100'
        ]);
        Koleksi::create([
            'nama' => 'Agama',
            'klasifikasi' => '200'
        ]);
        Koleksi::create([
            'nama' => 'Ilmu Sosial',
            'klasifikasi' => '300'
        ]);
        Koleksi::create([
            'nama' => 'Bahasa',
            'klasifikasi' => '400'
        ]);
        Koleksi::create([
            'nama' => 'Ilmu Murni',
            'klasifikasi' => '500'
        ]);
        Koleksi::create([
            'nama' => 'Tekhnologi',
            'klasifikasi' => '600'
        ]);
        Koleksi::create([
            'nama' => 'Kesenian',
            'klasifikasi' => '700'
        ]);
        Koleksi::create([
            'nama' => 'Kesusastraan',
            'klasifikasi' => '800'
        ]);
        Koleksi::create([
            'nama' => 'Geografi / Sejarah',
            'klasifikasi' => '900'
        ]);
    }
}
