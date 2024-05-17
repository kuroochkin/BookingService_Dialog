<?php

namespace App\Http\Requests;

use App\Rules\RecipientExists;
use App\Rules\SenderExists;
use App\Rules\SenderOrRecipientExists;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sender_id' => ['required', 'string', new SenderExists($this->input('dialog_id'))],
            'recipient_id' => ['required', 'string', new RecipientExists($this->input('dialog_id'))],
            'text' => 'required|min:2|max:300',
            'dialog_id' => 'required|string|exists:dialogs,id',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
