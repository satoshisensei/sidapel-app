<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PengunjungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nomor' => $this->faker->numerify('P##-##'),
            'tujuan' => $this->faker->sentence(2,true),
            'gender_id' => mt_rand(1,2),
            'category_id' => mt_rand(1,3),
            'pendidikan_id' => mt_rand(1,8),
            'pekerjaan_id' => mt_rand(1,4)
        ];
    }
}
