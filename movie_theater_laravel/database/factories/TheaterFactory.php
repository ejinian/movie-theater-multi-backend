<?php

namespace Database\Factories;

use App\Models\Theater;
use Illuminate\Database\Eloquent\Factories\Factory;

class TheaterFactory extends Factory
{
    protected $model = Theater::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'location' => $this->faker->address(),
        ];
    }
}
