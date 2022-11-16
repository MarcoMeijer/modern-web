<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->realText(),
            'published_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
            'author_id' => $this->faker->numberBetween(1, 10),
            'thread_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
