<?php

namespace App\Http\Controllers;

use App\Http\Requests\DialogRequest;
use App\Models\Dialog;
use App\Services\DialogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DialogController extends BaseController
{
    public function __construct(private readonly DialogService $dialogService)
    {
    }

    public function create(DialogRequest $request): JsonResponse
    {
        $result = $this->dialogService->create($request);

        if (!$result) {
            return response()->json(['error' => 'Ошибка сохранения.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success' => 'Успешно сохранено.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function getByLandlordAndTenantIds(Request $request): JsonResponse
    {
        $result = $this->dialogService->getByLandlordAndTenantIds($request);

        if (!$result) {
            return response()->json(['error' => 'Ошибка получения диалога.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json($result->toJson())->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

}
