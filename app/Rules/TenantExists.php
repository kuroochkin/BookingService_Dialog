<?php

namespace App\Rules;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\ValidationRule;

class TenantExists implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $client = new Client(['base_uri' => 'http://booking-service.loc']);

        $response = $client->get('/api/tenant/get', [
            'query' => ['tenant_id' => $value],
        ]);

        if ($response->getBody()->getContents() === '{"error":"Ошибка получения жильца."}') {
            echo 'Такого жильца не существует!';
            die;
        }
    }

}
