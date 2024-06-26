<?php

namespace App\Http\Requests;

use App\Enums\Transaction\TypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:196'],
            'type' => ['required', Rule::in(TypeEnum::values())],
            'amount' => ['required', 'numeric', 'min:0'],
            'transactioned_at' => ['required', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
