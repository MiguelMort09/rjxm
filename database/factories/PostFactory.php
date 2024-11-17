<?php

namespace Database\Factories;

use App\Enums\StatusPost;
use App\Enums\TypePost;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
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
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(),
            'status' => StatusPost::tryFrom($this->faker->randomElement([1, 2])),
            'type' => TypePost::tryFrom($this->faker->randomElement([1, 2])),
            'cover_image' => $this->faker->imageUrl(),
        ];
    }
}
