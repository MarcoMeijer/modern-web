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
            'title' => $this->faker->sentence(),
            'body' => $this->faker->realText(),
            'published_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
            'author_id' => $this->faker->numberBetween(1, 10),
            'topic_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}