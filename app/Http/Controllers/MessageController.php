<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Services\MessageService;
use Illuminate\Http\JsonResponse;

class MessageController extends BaseController
{
    public function __construct(private readonly MessageService $messageService)
    {
    }

    public function create(MessageRequest $request): JsonResponse
    {
        $result = $this->messageService->create($request);

        if (!$result) {
            return response()->json(['error' => 'Ошибка сохранения.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success' => 'Успешно сохранено.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function getMessagesByDialogId(int $id): JsonResponse
    {
        $result = $this->messageService->getAllMessagesByDialogId($id);

        if (!$result) {
            return response()->json(['error' => 'Ошибка получения.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['messages' => $result->toJson()])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

}
