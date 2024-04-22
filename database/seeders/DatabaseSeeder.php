<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => 'test',
            'role' => null,
        ]);

        // Post::factory()->count(10)->create();
        // Categorie::factory()->count(5)->create();

        $categories = Categorie::factory(10)->create();

        Post::factory(100)->create()->each(function ($post) use ($categories) {
            $randomCategory = $categories->random();
            $post->categories()->attach($randomCategory);
        });

    }
}

$categories = Categorie::factory(10)->create();

Post::factory(100)->create()->each(function ($post) use ($categories) {
    $post->categories()->attach($categories);
});


Post::factory(100)->create()->each(function ($post) {
    $post->categories()->attach(Categorie::factory()->create());
});
