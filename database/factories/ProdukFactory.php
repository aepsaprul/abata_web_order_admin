<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'nama' => fake()->name(),
          'harga' => fake()->randomNumber(6, true),
          'kategori_id' => fake()->randomNumber(1, true),
          'gambar' => fake()->imageUrl($width=600, $height=600),
        ];
    }
}
