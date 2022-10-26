<?php

namespace Database\Factories;

use App\Models\Post;
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
    protected $model = Post::class;
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => fake()->text(30),
            'slug' => fake()->slug(10),
            'views' => 0,
            'body' => fake()->text(500),
            'image' => 'images/dummy.png',
            'cat_id' => 1
        ];
    }
}
