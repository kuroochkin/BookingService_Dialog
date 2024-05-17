<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class DialogControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreate(): void
    {
        $requestData = [
            'landlord_id' => '1e0c5ca0-0173-4287-b72d-d8faddccd892',
            'tenant_id' => 'ae694f47-75b8-405c-84eb-5de03dec36a6',
        ];

        $this->post('api/dialog/create', $requestData);

        $this->assertDatabaseCount('dialo', 1);
        $this->assertDatabaseHas('dialogs', $requestData);
    }

}
