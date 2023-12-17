<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => '1',
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'num_of_hires' => $this->faker->numberBetween(1, 500),
            'turnover_rate' => $this->faker->randomFloat(1, 0, 100),
            'paid_holidays_rate' => $this->faker->randomFloat(1, 0, 100),
            'annual_income' => $this->faker->numberBetween(200, 1500),
            'work_overtime' => $this->faker->randomFloat(1, 0, 100),
            'starting_salary' => $this->faker->numberBetween(15, 50),
            'created_at' => $this->faker->dateTimeBetween('-5 years'),
        ];
    }
}
