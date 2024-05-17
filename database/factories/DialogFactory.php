<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dialog>
 */
class DialogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'landlord_id' => Str::uuid(),
            'tenant_id' => Str::uuid(),
        ];
    }
}
