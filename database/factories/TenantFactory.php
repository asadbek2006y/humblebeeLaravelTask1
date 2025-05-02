<?php

namespace Database\Factories;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    protected $model = Tenant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'domain' => $this->faker->domainName,
            'config_json' => [
                'enable_feature_x' => $this->faker->boolean,
                'theme' => $this->faker->randomElement(['light', 'dark']),
            ],
        ];
    }
}
