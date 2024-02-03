<?php

namespace Database\Factories;

use App\Models\Security;
use App\Models\SecurityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Security>
 */
class SecurityFactory extends Factory
{
    protected $model = Security::class;

    public function definition()
    {
        return [
            'security_type_id' => SecurityType::factory(),
            'symbol' => $this->faker->unique()->word,
        ];
    }
}
