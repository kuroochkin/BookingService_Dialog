<?php

namespace App\Rules;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\ValidationRule;

class SenderOrRecipientExists implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }

}
