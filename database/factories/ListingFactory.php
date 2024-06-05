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
            'status' => 'new, old, slightly used',
            'price' => $this->faker->company(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(2),
            'contactPhone' => $this->faker->sentence(),
            'contactEmail' => $this->faker->companyEmail(),
        ];
    }
}
           
            
