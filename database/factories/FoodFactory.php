<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Food::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        return [
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->text($maxNbChars = 200),
            'picture' => $this->faker->imageUrl($width = 640, $height = 480, 'food'),
            'status' => 1
        ];
    }
}
