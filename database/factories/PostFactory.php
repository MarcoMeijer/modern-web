<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentance(),
            'body' => fake()->realText(),
            'published_at' => fake()->dateTimeBetween('-2 weeks', 'now'),
            'author_id' => fake()->numberBetween(1,5),
        ];
    }
}
