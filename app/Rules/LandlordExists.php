<?php

namespace App\Rules;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\ValidationRule;

class LandlordExists implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $client = new Client(['base_uri' => 'http://accommodation-service.loc']);

        $response = $client->get('api/landlord/get', [
            'query' => ['landlord_id' => $value],
        ]);

        if ($response->getBody() === '{"error":"Ошибка получения землевладельца."}') {
            echo 'Такого землевладельца не существует!';
            die;
        }
    }

}
