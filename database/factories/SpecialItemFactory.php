<?php

namespace Database\Factories;
use App\Models\SpecialItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpecialItem>
 */
class SpecialItemFactory extends Factory
{

    protected $model = SpecialItem::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name' => $this->faker->words(3, true),
            'content' => $this->faker->sentence,
            'image' => $this->faker->randomElement(['assets/img/special-01.jpg',
            'assets/img/special-02.jpg',
            'assets/img/special-03.jpg',
            'assets/img/special-04.jpg',
            'assets/img/special-05.jpg',
            'assets/img/special-06.jpg',
        ]),
        ];
    }
}
