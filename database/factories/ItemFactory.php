<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->cityPrefix()   ,
            'category_id'=>mt_rand(1,4),
            'item_code'=>$this->faker->ean8(),
            'brand'=>$this->faker->randomElement(['Asus', 'Lenovo', 'MSI', 'Samsung', 'Acer']),
            'status'=>$this->faker->randomElement(['rusak', 'hilang', 'terpinjam', 'in stock']) ,
            'location'=>$this->faker->randomElement(['Ruang Sisda', 'PPK PP', 'KPSDA', 'PPK BMN', 'PPK PSDA']) ,
            'owner'=>$this->faker->randomElement(['Sisda', 'Pp', 'Op', 'Psda', 'Kabalai']),
        ];
    }
}
