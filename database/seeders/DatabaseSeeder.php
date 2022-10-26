<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 random users
        User::factory(10)->create();

        // Create 10 random quotes with fixed body
        Quote::factory(10)->create();

        // Create 10 random posts
        Post::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
