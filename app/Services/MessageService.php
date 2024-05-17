<?php

namespace App\Services;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Repositories\DialogRepository;
use App\Repositories\MessageRepository;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Mockery\Exception;

final class MessageService
{
    public function __construct(
        private readonly MessageRepository $messageRepository,
        private readonly DialogRepository  $dialogRepository,
    )
    {

    }

    public function create(MessageRequest $request): ?Message
    {
        $dialog = $this->dialogRepository->getById($request->input('dialog_id'));

        $request->merge(['date' => Carbon::now()->timezone('Europe/Moscow')->format('d-m-Y H:i:s')]);
        $request->merge(['id' => Str::uuid()->toString()]);

        return $this->messageRepository->create($request);
    }

    public function getAllMessagesByDialogId(int $id): ?Collection
    {
        $result = $this->messageRepository->getAllMessagesByDialogId($id);

        return $result ? $result : null;
    }

}
