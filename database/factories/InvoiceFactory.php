<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $total_vat = $this->faker->randomFloat(2, 0, 2);
        $exclude = $this->faker->randomFloat(2, 0, 2);
        return [
            'total_vat' => $total_vat,
            'total_price_excluding_vat' => $exclude,
            'invoice_number' => $this->faker->randomLetter(),
            'total_price' => (float) $total_vat + (float) $exclude
        ];
    }
}
