<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\rent_log>
 */
class rent_logFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>mt_rand(1,4),
            'item_id'=>mt_rand(1,400),
            'rent_date' =>$this->faker->date(),
            'return_date'=>$this->faker->date(),
        ];
    }
}
