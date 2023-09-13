<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipping>
 */
class ShippingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zipcode' => $this->faker->postcode(),
            'district' => $this->faker->word(),
            'number' => $this->faker->buildingNumber(),
            'complement' => $this->faker->word(),
            'tracking_code' => $this->faker->uuid(),
            'status' => $this->faker->randomElement(OrderStatusEnum::cases()),
        ];
    }
}
