<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
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
            'tags' => 'new, old, slightly used',
            'price' => $this->faker->numberBetween(100, 10000),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(2),
            'contactPhone' => $this->faker->phoneNumber(),
            'contactEmail' => $this->faker->companyEmail(),
            'photo' => $this->faker->imageUrl()
        ];
    }
}
           
            
