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
            'title' => $this->faker->sentance(),
            'body' => $this->faker->realText(),
            'published_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
            'author_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}