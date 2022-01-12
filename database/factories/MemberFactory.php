<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
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
            'nomor' => $this->faker->numerify('M##-##'),
            'category_id' => mt_rand(1,3),
            'pendidikan_id' => mt_rand(1,8),
            'pekerjaan_id' => mt_rand(1,4)
        ];
    }
}
