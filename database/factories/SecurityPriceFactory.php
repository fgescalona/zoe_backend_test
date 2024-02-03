<?php

namespace Database\Factories;

use App\Models\SecurityPrice;
use App\Models\Security;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SecurityPrice>
 */
class SecurityPriceFactory extends Factory
{
    protected $model = SecurityPrice::class;

    public function definition()
    {
        return [
            'security_id' => Security::factory(),
            'last_price' => $this->faker->randomFloat(2, 100, 300),
            'as_of_date' => $this->faker->dateTime(),
        ];
    }
}
