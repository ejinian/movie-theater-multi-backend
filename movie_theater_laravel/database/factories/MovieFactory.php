<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'genre' => $this->faker->randomElement(['action', 'drama', 'comedy', 'horror', 'sci-fi']),
        ];
    }
}
