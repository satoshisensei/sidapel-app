<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\MemberSeeder;
use Database\Seeders\KoleksiSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PekerjaanSeeder;
use Database\Seeders\PeminjamanSeeder;
use Database\Seeders\PendidikanSeeder;
use Database\Seeders\PengembalianSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            GenderSeeder::class,
            KoleksiSeeder::class,
            PendidikanSeeder::class,
            PekerjaanSeeder::class,
            CategorySeeder::class,
            // MemberSeeder::class,
            // PengunjungSeeder::class,
            // PeminjamanSeeder::class,
            // PengembalianSeeder::class
        ]);
    }
}
