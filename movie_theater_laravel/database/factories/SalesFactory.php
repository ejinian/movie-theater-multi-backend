<?php

namespace Database\Factories;

use App\Models\Sales;
use App\Models\Theater;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
{
    protected $model = Sales::class;

    public function definition()
    {
        return [
            'theater_id' => Theater::factory(),
            'movie_id' => Movie::factory(),
            'date' => $this->faker->dateTimeBetween('-3 days', '+3 days')->format('Y-m-d'),
            'tickets_sold' => $this->faker->numberBetween(50, 500),
        ];
    }
}
