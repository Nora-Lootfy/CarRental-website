<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([
                "Mercedes Benz Class A", "BMW 3 Series", "Toyota Corolla", "Honda Civic",
                "Ford Mustang", "Tesla Model 3", "Audi A4", "Volkswagen Golf", "Hyundai Elantra",
                "Nissan Sentra", "Dodge Challenger", "Porsche 911", "Land Rover Defender", "Jeep Wrangler",
                "Mini Cooper", "Chevrolet Camaro", "Subaru Outback", "Mazda MX-5 Miata", "Kia Soul", "Honda Accord"
            ]),
            'doors' => fake()->numberBetween(2, 6),
            'luggage' => fake()->numberBetween(2, 6),
            'passengers' => fake()->numberBetween(2, 6),
            'price'=> fake()->randomFloat(nbMaxDecimals: 2, min: 10, max: 100),
            'description' => fake()->text(),
            'image' => fake()->randomElement(['car_1.jpg', 'car_2.jpg', 'car_3.jpg', 'car_4.jpg', 'car_5.jpg', 'car_6.jpg', 'car_7.jpg']),
            'active' =>fake()->numberBetween(0,1),
            'category_id' =>fake()->numberBetween(1, 10),
        ];
    }
}
