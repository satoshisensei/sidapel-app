<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pendidikan::create([
            'tingkat' => 'TK'
        ]);
        Pendidikan::create([
            'tingkat' => 'SD'
        ]);
        Pendidikan::create([
            'tingkat' => 'MI'
        ]);
        Pendidikan::create([
            'tingkat' => 'SMP'
        ]);
        Pendidikan::create([
            'tingkat' => 'MTs'
        ]);
        Pendidikan::create([
            'tingkat' => 'SMA'
        ]);
        Pendidikan::create([
            'tingkat' => 'SMK'
        ]);
        Pendidikan::create([
            'tingkat' => 'MA'
        ]);
    }
}
