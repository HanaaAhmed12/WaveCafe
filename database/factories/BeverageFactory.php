<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beverage>
 */
class BeverageFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categoryIds = Category::pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'published' => $this->faker->boolean(),
            'special' => $this->faker->boolean(),
            'image' => $this->faker->imageUrl(640, 480, 'product', true, 'Faker'),
                  // 'category_id' => $this->faker->numberBetween(1, 20),
            'category_id' => $this->faker->randomElement([1, 2, 3]),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}