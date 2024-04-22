<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->sentence(10),
            'picture' => fake()->randomElement(['1713771160.jpg', '1713771188.jpg', '1713771208.jpg']),
            'author' =>  User::inRandomOrder()->first()->id,
        ];
    }
}
