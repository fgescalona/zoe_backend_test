<?php

namespace Database\Factories;

use App\Models\SecurityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SecurityType>
 */
class SecurityTypeFactory extends Factory
{
    protected $model = SecurityType::class;

    public function definition()
    {
        return [
            'slug' => $this->faker->slug,
            'name' => $this->faker->word,
        ];
    }
}
