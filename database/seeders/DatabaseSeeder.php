<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => 'test',
        // ]);
        Post::factory()->create([
            'title' => 'Test Post 3',
            'content' => 'content-test 3',
            'description' => 'description-test 3',
            'picture' => 'picture-test 3',
            'categories' => 'categories-test 3',
            'author' => 'author-test 3',
        ]);
    }
}
