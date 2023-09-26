<?php

namespace App\Http\Requests\PurchaseOrderDetails;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'string',
            'comment' => '',
            'email' => 'email',
            'phone_number' => 'string',
            'city' => 'string',
            'street' => 'string',
            'floor' => 'integer',
            'porch_number' => 'integer',
            'payment_option_id' => 'integer',
        ];
    }
}
