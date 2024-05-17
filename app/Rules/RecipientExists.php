<?php

namespace App\Rules;

use App\Models\Dialog;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RecipientExists implements ValidationRule
{
    public function __construct(public string $dialogId) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dialog = Dialog::where('tenant_id', '=', $value)
            ->orWhere('landlord_id', $value)
            ->first();

        if ($dialog === null) {
            echo 'Такого получателя не существует!';
            die;
        } else {
            if ($dialog->id !== $this->dialogId) {
                echo 'В этом диалоге нет такого получателя!';
                die;
            }
        }

    }
}
