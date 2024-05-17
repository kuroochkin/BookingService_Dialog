<?php

namespace App\Http\Requests;

use App\Rules\LandlordExists;
use App\Rules\TenantExists;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DialogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'landlord_id' => ['required', 'string', new LandlordExists()],
            'tenant_id' => ['required', 'string', new TenantExists()],
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json_encode($validator->errors(), 422));
    }

}
