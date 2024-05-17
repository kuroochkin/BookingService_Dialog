<?php

namespace Tests\Feature;

use App\Models\Dialog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class MessageController extends TestCase
{
    use RefreshDatabase;

    public function testCanCreate(): void
    {
        $uuid = Str::uuid()->toString();
        Dialog::factory()->create([
            'id' => $uuid,
            'landlord_id' => '1e0c5ca0-0173-4287-b72d-d8faddccd892',
            'tenant_id' => 'ae694f47-75b8-405c-84eb-5de03dec36a6',
        ]);
        $requestData = [
            'sender_id' => '1e0c5ca0-0173-4287-b72d-d8faddccd892',
            'recipient_id' => 'ae694f47-75b8-405c-84eb-5de03dec36a6',
            'text' => 'message test',
            'dialog_id' => $uuid,
        ];

        $this->post('api/message/create', $requestData);

        $this->assertDatabaseCount('messages', 1);
        $this->assertDatabaseHas('messages', $requestData);
    }

}
