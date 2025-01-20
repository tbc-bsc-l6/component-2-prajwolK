<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    protected $model = Food::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'detail' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 50),
            'image' => $this->faker->imageUrl(640, 480, 'food', true),
        ];
    }
}
