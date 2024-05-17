<?php

namespace App\Repositories;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;

final class MessageRepository
{
    public function create(MessageRequest $request): ?Message
    {
        $result = Message::create($request->only((new Message())->getFillable()));

        return $result ?? null;
    }

    public function getAllMessagesByDialogId(int $id): ?Collection
    {
        return Message::where('dialog_id', '=', $id)->get();
    }

}
