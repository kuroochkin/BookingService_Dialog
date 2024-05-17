<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sender_id' => Str::uuid(),
            'recipient_id' => Str::uuid(),
            'text' => fake()->realText(mt_rand(100, 200)),
            'dialog_id' => Str::uuid(),
        ];
    }

}
