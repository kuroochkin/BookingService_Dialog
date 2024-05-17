<?php

namespace App\Services;

use App\Http\Requests\DialogRequest;
use App\Models\Dialog;
use App\Repositories\DialogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class DialogService
{
    public function __construct(private readonly DialogRepository $dialogRepository)
    {

    }

    public function create(DialogRequest $request): null|bool|Dialog
    {
        if ($this->getByLandlordAndTenantIds($request)) {
            return true;
        }

        $request->merge(['id' => Str::uuid()->toString()]);

        return $this->dialogRepository->create($request);
    }

    public function getByLandlordAndTenantIds(Request $request): ?Dialog
    {
        return $this->dialogRepository->getByLandlordAndTenantIds($request->input('landlord_id'), $request->input('tenant_id'));
    }

}
