<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'nomor' => fake()->randomNumber(5, true),
          'nama' => fake()->name(),
          'produk' => fake()->word(),
          'quantity' => fake()->randomDigitNotNull(),
          'kota' => fake()->city(),
          'status' => fake()->word(),
          'status_bayar' => fake()->creditCardType(),
          'penerima' => fake()->name(),
          'tanggal' => fake()->date(),
          'total' => fake()->randomNumber(5, true),
          'metode_bayar' => fake()->creditCardType(),
        ];
    }
}
