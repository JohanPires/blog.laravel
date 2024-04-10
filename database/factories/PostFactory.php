<?php

namespace Database\Factories;

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
            'picture' => fake()->imageUrl(600,300),
            'categories' => fake()->randomElement(['web', 'tech', 'marketing']),
            'author' => fake()->word(),
        ];
    }
}
