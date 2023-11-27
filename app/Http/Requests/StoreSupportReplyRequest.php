<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'uuid'],
            'support_id' => ['required', 'uuid'],
            'description' => ['required', 'min:10']
        ];
    }
}
