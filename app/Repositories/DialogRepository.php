<?php

namespace App\Repositories;

use App\Http\Requests\DialogRequest;
use App\Models\Dialog;

final class DialogRepository
{
    public function create(DialogRequest $request): ?Dialog
    {
        $result = Dialog::create($request->only((new Dialog())->getFillable()));

        return $result ?? null;
    }

    public function getById(string $id): ?Dialog
    {
        return Dialog::find($id);
    }

    public function getByLandlordAndTenantIds(string $landlordId, string $tenantId): ?Dialog
    {
        try {
            $result = Dialog::where('landlord_id', '=', $landlordId)
                ->where('tenant_id', '=', $tenantId)->first();
        } catch (\Exception $exception) {
            return null;
        }

        return $result ? $result : null;
    }

}
