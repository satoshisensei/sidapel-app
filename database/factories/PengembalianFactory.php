<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PengembalianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'member_id' => mt_rand(1,100),
            'koleksi_id' => mt_rand(1,10),
            'tanggal' => $this->faker->dateTime(now())
        ];
    }
}
